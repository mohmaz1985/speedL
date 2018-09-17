<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Settings */

$this->title = Yii::t('yii','Create').' '.Yii::t('yii','Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
