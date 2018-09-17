<?php

namespace backend\controllers;

use Yii;
use backend\models\Categories;
use backend\models\CategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\General;
/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    public $generalObj;
    public $modelID;

    public function init()
    {
      $this->generalObj = new General();
      $this->modelID=4; //Users Managment
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' =>[
             'class'=>AccessControl::className(),
             'only'=>['index','create','update','delete','view','create-sub','data-per-page','list-of-categories'],
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
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize= $this->generalObj->getDataPerPage($this->modelID);

        $dataProvider->sort = ['defaultOrder' => ['id' => SORT_DESC]];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
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
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();

        if ($model->load(Yii::$app->request->post())) {

            if(empty($model->parentid)){
               $model->parentid=0; 
            }

            // Created Time
            $model->created_at = time();

            // Created By
            $model->created_by = Yii::$app->user->identity->id;

            // Language
            $model->lang = Yii::$app->language;


            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionCreateSub($parentid)
    {
        $model = new Categories();
        $model2 = $this->findModel($parentid);

        if ($model->load(Yii::$app->request->post())) {

            $model->modelID = $model2->modelID;
            $model->parentid=$parentid; 
            
            
            // Created Time
            $model->created_at = time();

            // Created By
            $model->created_by = Yii::$app->user->identity->id;

            // Language
            $model->lang = Yii::$app->language;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create-sub', [
                'model' => $model,
                'model2' =>$model2,
            ]);
        }
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            // Save Time 
            $model->updated_at = time();

            // Created By
            $model->updated_by = Yii::$app->user->identity->id;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $isParent = Categories::find()->where(['parentid'=>$id])->count();

        if($model->numberOfUse==0 && $isParent==0){
            $model->delete();
            Yii::$app->session->setFlash('success', Yii::t('yii','Operation Successfully Completed'));
            return $this->redirect(['index']);

        }else{
            
            Yii::$app->session->setFlash('danger', Yii::t('yii','Failed Delete: Reserved Category'));
            return $this->redirect(['index']);
        }

       
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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
    // Function List Of Categories By Mohammad Alsayyed 00962789670033
    public function actionListOfCategories(){
           return $this->render('list-of-categories', [
                //'model' =>$modelValue,
           ]);
    }
}
