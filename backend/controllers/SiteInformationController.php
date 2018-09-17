<?php

namespace backend\controllers;

use Yii;
use backend\models\SiteInformation;
use backend\models\SiteInformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\General;

/**
 * SiteInformationController implements the CRUD actions for SiteInformation model.
 */
class SiteInformationController extends Controller
{
    public $generalObj;
    public $modelID;

    public function init()
    {
      $this->generalObj = new General();
      $this->modelID=9; //Users Management
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
     * Lists all SiteInformation models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new SiteInformationSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Displays a single SiteInformation model.
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
     * Creates a new SiteInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SiteInformation();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // Created Time
            $model->created_at = time();

            // Created By
            $model->created_by = Yii::$app->user->identity->id;

            // Language
            $model->lang = Yii::$app->language;

            $model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // return $this->render('create', [
            //     'model' => $model,
            // ]);
        }
         throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Updates an existing SiteInformation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

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
     * Deletes an existing SiteInformation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();

        //return $this->redirect(['index']);
         throw new NotFoundHttpException('The requested page does not exist.'); 
    }

    /**
     * Finds the SiteInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SiteInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
