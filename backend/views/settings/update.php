<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Settings */
$titleValue='title'.strtoupper(Yii::$app->language);
$this->title = Yii::t('yii','Update').' '.Yii::t('yii','Settings').': '.$model->$titleValue;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->$titleValue, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii','Update');
?>
<div class="settings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
