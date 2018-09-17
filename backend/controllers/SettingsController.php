<?php

namespace backend\controllers;

use Yii;
use backend\models\Settings;
use backend\models\SettingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
/**
 * SettingsController implements the CRUD actions for Settings model.
 */
class SettingsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' =>[
             'class'=>AccessControl::className(),
             'only'=>['index','create','update','delete','view','data-per-page','recover'],
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
     * Lists all Settings models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->identity->type==203){
            $searchModel = new SettingsSearch();
            $dataPerPage = Settings::find()
                        ->where(['id' => '1'])
                        ->one();

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $dataProvider->pagination->pageSize=$dataPerPage['dataPerPage'.strtoupper(Yii::$app->language)];
            $dataProvider->sort = ['defaultOrder' => ['id' => SORT_DESC]];

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else
        {
          throw new NotFoundHttpException('You dont have permissions to view this page.');
        }
           
    }

    /**
     * Displays a single Settings model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->identity->type==203){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else
        {
          throw new NotFoundHttpException('You dont have permissions to view this page.');
        }
    }

    /**
     * Creates a new Settings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->identity->type==203){
            $model = new Settings();

            if ($model->load(Yii::$app->request->post())) {

                // Created Time
                $model->created_at = time();

                // Created By
                $model->created_by = Yii::$app->user->identity->id;

                //Add Status
                $model->status=1;

                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else
        {
          throw new NotFoundHttpException('You dont have permissions to view this page.');
        }
    }

    /**
     * Updates an existing Settings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->identity->type==203){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {

                // Updated Time
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
        }else
        {
          throw new NotFoundHttpException('You dont have permissions to view this page.');
        }
    }

    /**
     * Deletes an existing Settings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->identity->type==203){
            $model=$this->findModel($id);
            //Add Status
            $model->status=2;
            $model->save();
            return $this->redirect(['index']);
        }else
        {
          throw new NotFoundHttpException('You dont have permissions to view this page.');
        }
    }

    /**
     * Finds the Settings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Settings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Settings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    // function Data Per Page mohamamd Alsayyed
    public function actionDataPerPage()
    {
        if(Yii::$app->user->identity->type==203){
          $modelValue= Settings::find()
                          ->where(['id' => '1'])
                          ->one();

            if ($modelValue->load(Yii::$app->request->post()) ) {
              
                  $dataPerPageValue = 'dataPerPage'.strtoupper(Yii::$app->language);
                  $modelValue->$dataPerPageValue=$modelValue->$dataPerPageValue;
                  $modelValue->updated_by= Yii::$app->user->identity->id;
                  $modelValue->updated_at = time();
                  $modelValue->save();

                  $modelValue->save(false);
                return $this->redirect(['data-per-page']);
            }
            else
            return $this->render('data-per-page', [
                'model' =>$modelValue,
            ]);
        }else
        {
          throw new NotFoundHttpException('You dont have permissions to view this page.');
        }   
    }
    // function Management (delete from database,recover,order by) mohamamd Alsayyed
    public function actionManagement()
    {
      if(Yii::$app->user->identity->type==203){
          $dataPerPage = Settings::find()
                          ->where(['id' => '1'])
                          ->one();

            // pagination Management Page mohamamd Alsayyed
            $query= Settings::find();
            $countQuery = clone $query;
            $pagination = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>$dataPerPage['dataPerPageEN']]);
            $modelValueSettings=$query->offset($pagination->offset)
                              ->limit($pagination->limit)
                              ->all();
            
              return $this->render('management', [
                  'model' => $modelValueSettings,
                  'pagination' => $pagination,
              ]);
        }else{
            throw new NotFoundHttpException('You dont have permissions to view this page.');
        }
    }
     // Recover Data Mohammad Alsayyed 0789670033
    public function actionRecover()
    {
       if(Yii::$app->user->identity->type==203){
            $id=Yii::$app->getRequest()->getQueryParam('id');
            $modelRecover=$this->findModel($id);
            $modelRecover->status = 1;
            $modelRecover->save();
            return $this->redirect(['management']);

        }else{
            throw new NotFoundHttpException('You dont have permissions to view this page.');
        }
    }
}
