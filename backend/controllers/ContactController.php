<?php

namespace backend\controllers;

use Yii;
use backend\models\Contact;
use backend\models\ContactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\General;


/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends Controller
{
    public $generalObj;
    public $modelID;

    public function init()
    {
      $this->generalObj = new General();
      $this->modelID=5; //Users Management
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
         return [
          'access' =>[
             'class'=>AccessControl::className(),
             'only'=>['index','create','update','delete','view','data-per-page','management'],
             'rules'=>
               [
                    [
                      'allow'=>true,
                      'roles'=>['@'],
                    ]
               ]
           ],
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['POST'],
              ],
          ],       
        ];
    }

    /**
     * Lists all Contact models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize= $this->generalObj->getDataPerPage($this->modelID);
        $dataProvider->sort = ['defaultOrder' => ['order_recorder' => 'ASC']];
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contact model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contact model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
           
            // Save Image
            $model->image=$this->generalObj->saveFile('contact',$model,$model->title);
            
            // Created Time
            $model->created_at = time();

            // Created By
            $model->created_by = Yii::$app->user->identity->id;

            // Language
            $model->lang = Yii::$app->language;

            //Status
            $model->status=1;

            //categories Update Number Of Use
            $this->generalObj->categoriesUpdateNumberOfUse($model->categories,'');

            // Order Recorder
            $max = Contact::find()->select('max(id)')->scalar()+1;
            $model->order_recorder=$max;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contact model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Old Image
        $oldImage=$model->image;
        // Old categories
        $oldCategories = $model->categories;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // Update Image
            $model->image=$this->generalObj->updateFile('contact',$model,$oldImage,$model->title);
            
            // Save Time 
            $model->updated_at = time();

            // Created By
            $model->updated_by = Yii::$app->user->identity->id;

            //categories Update Number Of Use
            $this->generalObj->categoriesUpdateNumberOfUse($model->categories,$oldCategories);

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contact model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $updateStatus = $this->findModel($id);
        $updateStatus->status=2;
        $updateStatus->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Contact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    // Delete Image
    public function actionImageDelete(){
        $id=Yii::$app->getRequest()->getQueryParam('id');
        $query=$this->findModel($id);
        
        if(file_exists($query->image)){
            unlink($query->image);
            $query->image='';
            $query->save();
        }   
        // for move Jquery Error
        echo json_encode('');
    } 
    // function Data Per Page mohamamd Alsayyed
    public function actionDataPerPage()
    {
            $modelValue= $this->generalObj->getSettingsModelObj($this->modelID);
          
            if ($modelValue->load(Yii::$app->request->post()) ) {

              $dataPerPageValue = 'dataPerPage'.strtoupper(Yii::$app->language);
              $modelValue->$dataPerPageValue=$modelValue->$dataPerPageValue;
              $modelValue->updated_by= Yii::$app->user->identity->id;
              $modelValue->updated_at = time();
              $modelValue->save();
              
              return $this->redirect(['data-per-page']);
            }
            else
            return $this->render('data-per-page', [
                'model' =>$modelValue,
            ]);
          
    }
    // function Management (delete from database,recover,order by) mohamamd Alsayyed
    public function actionManagement()
    {
          $modelManage = $this->generalObj->modelManagement($this->modelID);
          
          return $this->render('management', [
              'model' => $modelManage[0],
              'pagination' => $modelManage[1],
          ]);
    }

    // delete file form folder and delete recored from database Mohammad Alsayyed
    public function actionDeleteFromDatabase()
    {
        $id=Yii::$app->getRequest()->getQueryParam('id');
        $modelDelete=$this->findModel($id);

        if($modelDelete->image!='-')
        {
          if(file_exists($modelDelete->image))
            unlink($modelDelete->image);
        }

        //categories Update Number Of Use
        $this->generalObj->categoriesUpdateNumberOfUse($modelDelete->categories,'delete');
        
        $modelDelete->delete();

        return $this->redirect(['management']);
    }

    // recover data , update state
    public function actionRecover()
    {
        $id=Yii::$app->getRequest()->getQueryParam('id');
        $modelRecover=$this->findModel($id);
        $modelRecover->status=1;
        $modelRecover->save();

        return $this->redirect(['management']);
    }
    // update Order
    public function actionUpdateOrder(){

        $modelValueQuery = $this->generalObj->modelManagement($this->modelID);       
        // update Order By mohammad Alsayyed 
        foreach($modelValueQuery[0] as $i=>$result ){

                if ($result->load(Yii::$app->request->post()) )
                {
                    $arrayPost=Yii::$app->request->post();
                    
                    $modelDataOld = Contact::find()->where(['order_recorder' => $arrayPost['Contact']['old_order_recorder']])->one();

                    $modelDataNew = Contact::find()->where(['order_recorder' => $arrayPost['Contact']['order_recorder']])->one();

                    $model1 = $this->findModel($modelDataOld['id']);
                    $model1->order_recorder = $arrayPost['Contact']['order_recorder'];
                    $model1->save();

                    $model2 = $this->findModel($modelDataNew['id']);
                    $model2->order_recorder = $arrayPost['Contact']['old_order_recorder'];
                    $model2->save();
                    
                    return $this->redirect(['management']);
                }
          }
    }

}
