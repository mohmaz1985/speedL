<?php

namespace backend\controllers;

use Yii;
use backend\models\UsersManagement;
use backend\models\UsersManagementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\General;
use yii\filters\AccessControl;


/**
 * UsersManagementController implements the CRUD actions for UsersManagement model.
 */
class UsersManagementController extends Controller
{
    public $generalObj;
    public $modelID;

    public function init()
    {
      $this->generalObj = new General();
      $this->modelID=2; //Users Managment
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' =>[
             'class'=>AccessControl::className(),
             'only'=>['index','create','update','delete','view','profile','data-per-page'],
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
     * Lists all UsersManagement models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->identity->type==201 || Yii::$app->user->identity->type==203)
        {
        $searchModel = new UsersManagementSearch();
        

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize= $this->generalObj->getDataPerPage($this->modelID);

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
     * Displays a single UsersManagement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->identity->type==201 || Yii::$app->user->identity->type==203)
        {
          return $this->render('view', [
              'model' => $this->findModel($id),
          ]);
        }else
        {
          throw new NotFoundHttpException('You dont have permissions to view this page.');
        }
    }

    /**
     * Creates a new UsersManagement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->identity->type==201 || Yii::$app->user->identity->type==203)
        {
        $model = new UsersManagement();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
              
        // Save Image
        $model->image=$this->generalObj->saveFile('userImage',$model,$model->username);
        // Created Time
        $model->created_at = time();

        // Created By
        $model->created_by = Yii::$app->user->identity->id;

        // Password
        $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);

        // Auth Key
        $model->auth_key = Yii::$app->security->generateRandomString();

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
     * Updates an existing UsersManagement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      if(Yii::$app->user->identity->type==201 || Yii::$app->user->identity->type==203)
      {
        $model = $this->findModel($id);
        
        // Old Image
        $oldImage=$model->image;

        if ($model->load(Yii::$app->request->post())) {

        // Update Image
        $model->image=$this->generalObj->updateFile('userImage',$model,$oldImage,$model->username);
        
        // Save Time 
        $model->updated_at = time();

        // Created By
        $model->updated_by = Yii::$app->user->identity->id;

        if($model->change_password==1){
        // Password
        $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
        }
        
        $model->save(false);
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
     * Deletes an existing UsersManagement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      if(Yii::$app->user->identity->type==201 || Yii::$app->user->identity->type==203)
      {
        $model=$this->findModel($id);
        $model->status=103;
        $model->save(false);
        return $this->redirect(['index']);
      }else
      {
        throw new NotFoundHttpException('You dont have permissions to view this page.');
      }
    }

    /**
     * Finds the UsersManagement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsersManagement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsersManagement::findOne($id)) !== null) {
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
    // Update Profile
    public function actionProfile($id){
      if(Yii::$app->user->identity->id==$id)
      {

        $model = $this->findModel($id);
        // Old Image
        $oldImage=$model->image;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

          // Update Image
          $model->image=$this->generalObj->updateFile('userImage',$model,$oldImage,$model->username);
          
          // Save Time 
          $model->updated_at = time();

          // Created By
          $model->updated_by = Yii::$app->user->identity->id;

          if($model->change_password==1){
          // Password
          $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
          }

          $model->save();
            return $this->redirect(['profile', 'id' => $model->id]);
        } else {
            return $this->render('profile', [
                'model' => $model,
            ]);
        }
      }
      else {
          throw new NotFoundHttpException('The requested page does not exist.');
      }
    }
    // function Data Per Page mohamamd Alsayyed
    public function actionDataPerPage()
    {
        if(Yii::$app->user->identity->type==201 || Yii::$app->user->identity->type==203){
          
             
            $modelValue= $this->generalObj->getSettingsModelObj($this->modelID);
          
            if ($modelValue->load(Yii::$app->request->post()) ) {

              $modelValue->dataPerPageEN=$modelValue->dataPerPageEN;
              $modelValue->save();
              
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
}
