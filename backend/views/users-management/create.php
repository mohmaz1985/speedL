<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsersManagement */

$this->title = Yii::t('yii','Create').' '.Yii::t('yii','User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Users Managements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-management-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
