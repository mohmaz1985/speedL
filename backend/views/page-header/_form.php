<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use backend\models\Settings;
use common\models\General;
/* @var $this yii\web\View */
/* @var $model app\models\PageHeader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-header-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?php //= $form->field($model, 'id')->textInput() ?>
    <?php
      $dataList=ArrayHelper::map(Settings::find()->where(['pageHeader'=> 1])->asArray()->all(), 'id', 'title'.strtoupper(Yii::$app->language));
      echo $form->field($model, "modelID")->dropDownList($dataList, 
               [
                'prompt'=>Yii::t('yii','- Select Model -'),
                'disabled' => $model->isNewRecord ? false : true,
               ]);
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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
                            ['width'=> '120px', 'url'=> 'index.php?r=page-header/image-delete&id='.$model->id,'key'=>1]]
            ],
        ]);
    ?>

    <?php //= $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?php //= $form->field($model, 'created_by')->textInput() ?>

    <?php //= $form->field($model, 'updated_at')->textInput() ?>

    <?php //= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
