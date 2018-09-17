<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zxbodya\yii2\tinymce\TinyMce;
use zxbodya\yii2\elfinder\TinyMceElFinder;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use common\models\General;
/* @var $this yii\web\View */
/* @var $model app\models\Services */
/* @var $form yii\widgets\ActiveForm */

//Create Obj
$generalObj = new General();
?>

<div class="services-form">


    
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php
      $dataList=ArrayHelper::map($generalObj->showCategoriesSelectList(8), 'id', 'title');
      echo $form->field($model, "categories")->dropDownList($dataList, 
               [
                'prompt'=>Yii::t('yii','- Select Categories -'),
                //'disabled' => $model->isNewRecord ? false : true,
               ]);
    ?>


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
                            ['width'=> '120px', 'url'=> 'index.php?r=services/image-delete&id='.$model->id,'key'=>1]]
            ],
        ]);
    ?>

    <?=$form->field($model, 'description')->widget(
        TinyMce::className(),
        [
            'options' => ['rows' => 16],
            'language' => Yii::$app->language,
            'fileManager' => [
                'class' => TinyMceElFinder::className(),
                'connectorRoute' => 'el-finder/connector',
            ],
        ]
    )?>
    <?= $form->field($model, 'showInHeader')->checkbox(['uncheck' => 0, 'check' => 1]) ?>
    <?= $form->field($model, 'showInHomePage')->checkbox(['uncheck' => 0, 'check' => 1]) ?>
    <?= $form->field($model, 'showInSubMenu')->checkbox(['uncheck' => 0, 'check' => 1]) ?>
    <?= $form->field($model, 'publish')->checkbox(['uncheck' => 2, 'check' => 1]) ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?php //= $form->field($model, 'created_by')->textInput() ?>

    <?php //= $form->field($model, 'updated_at')->textInput() ?>

    <?php //= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii','Create') : Yii::t('yii','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
