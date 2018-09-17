<?php

namespace backend\controllers;

use Yii;
use backend\models\PageHeader;
use backend\models\PageHeaderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\General;

/**
 * PageHeaderController implements the CRUD actions for PageHeader model.
 */
class PageHeaderController extends Controller
{   
    public $generalObj;
    public $modelID;

    public function init()
    {
      $this->generalObj = new General();
      $this->modelID=3; //Users Management
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' =>[
             'class'=>AccessControl::className(),
             'only'=>['index','create','update','delete','view'],
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
     * Lists all PageHeader models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageHeaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PageHeader model.
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
     * Creates a new PageHeader model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PageHeader();

        if ($model->load(Yii::$app->request->post()) ) {

               
            // Save Image
            $model->image=$this->generalObj->saveFile('pageHeader',$model,$model->title);
            
            // Created Time
            $model->created_at = time();

            // Created By
            $model->created_by = Yii::$app->user->identity->id;

            // Language
            //$model->lang = Yii::$app->language;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PageHeader model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Old Image
        $oldImage=$model->image;

        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {

            // Update Image
            $model->image=$this->generalObj->updateFile('pageHeader',$model,$oldImage,$model->title);
            
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
     * Deletes an existing PageHeader model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $modelDelete = $this->findModel($id);

         if($modelDelete->image!='-')
        {
          if(file_exists($modelDelete->image))
            unlink($modelDelete->image);
        }
        
        $modelDelete->delete();

        return $this->redirect(['index']);
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

    /**
     * Finds the PageHeader model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PageHeader the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PageHeader::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
