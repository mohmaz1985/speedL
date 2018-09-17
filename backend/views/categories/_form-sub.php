<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Settings;
use common\models\General;
/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */

//Create Obj
$generalObj = new General();
?>

<div class="categories-form">
    <?php $form = ActiveForm::begin(); ?>

    <?php
      $dataList=ArrayHelper::map(Settings::find()->asArray()->all(), 'id', 'title'.strtoupper(Yii::$app->language));
      echo $form->field($model, "modelID")->dropDownList($dataList, 
               [
                'prompt'=>Yii::t('yii','- Select Model -'),
                'options'=>[$model2->modelID=>["Selected"=>true]],
                'disabled' => $model2->isNewRecord ? false : true,
               ]);
    ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'showINList')->checkbox(['uncheck' => 2, 'check' => 1]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii','Create') : Yii::t('yii','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
