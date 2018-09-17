<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Settings;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
      $dataList=ArrayHelper::map(Settings::find()->where(['categories'=> 1])->asArray()->all(), 'id', 'title'.strtoupper(Yii::$app->language));
      echo $form->field($model, "modelID")->dropDownList($dataList, 
               [
                'prompt'=>Yii::t('yii','- Select Model -'),
                'disabled' => $model->isNewRecord ? false : true,
               ]);
    ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'showINList')->checkbox(['uncheck' => 2, 'check' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii','Create') : Yii::t('yii','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
