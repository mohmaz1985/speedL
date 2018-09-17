<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\UsersManagement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-management-form"  ng-app="">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullName_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullName_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jobTitle_en')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'jobTitle_ar')->textInput(['maxlength' => true]) ?>

    <?php 
        echo $form->field($model, 'image')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showUpload' => false,
                'showCancel' => false,
                'browseClass' => 'btn btn-primary',
                'browseIcon' => '<i class="glyphicon glyphicon-camera">&nbsp;<b>'.Yii::t('yii','Browse').' ..</b></i>',
                'browseLabel' =>  '',
                'removeClass' => 'btn btn-warning',
                'removeIcon' => '<i class="glyphicon glyphicon-remove">&nbsp;<b>'.Yii::t('yii','Remove').' ..</b></i>',
                'removeLabel' =>  '',
                'allowedFileExtensions'=>['jpeg','jpg','gif','png'],
                'initialPreview'=>Html::img($model->image,['class'=>'file-preview-image kv-preview-data']),
                'initialPreviewConfig'=>[
                            ['width'=> '120px', 'url'=> 'index.php?r=users-management/image-delete&id='.$model->id,'key'=>1]]
            ],
        ]);
    ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->dropDownList(
                  ['201'=>Yii::t('yii','Admin'),'202'=>Yii::t('yii','User')],
                  ['prompt'=>Yii::t('yii','Select Type')]
    )?>
    <?= $form->field($model, 'status')->dropDownList(
                  ['101'=>Yii::t('yii','Active'),'102'=>Yii::t('yii','Block')],
                  ['prompt'=>Yii::t('yii','Select Status')]
    )?>

    <?
    if($model->isNewRecord){
        echo $form->field($model, 'password_hash')->passwordInput(['value'=>'','maxlength' => true]);
    }else{
        echo $form->field($model, 'change_password')->checkbox(['uncheck' => 0, 'checked' => 1,'ng-model'=>'myVar']);
        echo '<div ng-show="myVar">'.$form->field($model, 'password_hash')->passwordInput(['maxlength' => true]).'</div>';
    }
    ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii','Create') : Yii::t('yii','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
