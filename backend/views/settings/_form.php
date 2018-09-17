<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titleEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titleAR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelTableName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataPerPageEN')->textInput() ?>

    <?= $form->field($model, 'dataPerPageAR')->textInput() ?>

    <?= $form->field($model, 'categories')->checkbox(['uncheck' => 2, 'check' => 1]) ?>

    <?= $form->field($model, 'pageHeader')->checkbox(['uncheck' => 2, 'check' => 1]) ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?php //= $form->field($model, 'created_by')->textInput() ?>

    <?php //= $form->field($model, 'updated_at')->textInput() ?>

    <?php //= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii','Create') : Yii::t('yii','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
