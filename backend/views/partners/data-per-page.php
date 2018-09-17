<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Partners */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('yii','Data per page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dataPerPage'.strtoupper(Yii::$app->language))->textInput(['integer','required']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii','Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
