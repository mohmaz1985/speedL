<?php

use yii\helpers\Html;
use common\models\General;
/* @var $this yii\web\View */
/* @var $model app\models\UsersManagement */

// Create General instance
$generalObj = new General();

$this->title = Yii::t('yii','Update').' '.Yii::t('yii','User Information').': ' . $generalObj->showUserCU($model->id);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Users Managements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $generalObj->showUserCU($model->id), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii','Update');
?>
<div class="users-management-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
