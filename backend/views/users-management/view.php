<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\General;
/* @var $this yii\web\View */
/* @var $model app\models\UsersManagement */

// Create General instance
$generalObj = new General();

$this->title = $generalObj->showUserCU($model->id);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Users Managements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-management-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            'fullName_en',
            'fullName_ar',
            'jobTitle_en',
            'jobTitle_ar',
            [
               'attribute'=>'image',
               'format' => ['image',['width'=>'150','height'=>'150']],
            ],
            'email:email',
            [
              'attribute' => 'type',
              'format' => 'raw',
              'value' => $generalObj->showType($model->type),
            ],
            [
              'attribute' => 'status',
              'format' => 'raw',
              'value' => $generalObj->showStatus($model->status),
            ],
            [
               'attribute'=>'created_at',
               'value' => $generalObj->showTime($model->created_at)
            ],
            [
               'attribute'=>'lastLogin',
               'value' => $generalObj->showTime($model->lastLogin)
            ],
            [
               'attribute'=>'lastLogout',
               'format' => 'raw',
               'value' => $generalObj->showLogoutTime($model->lastLogout,$model->forceLogout,$model->lastLogin)
            ],
            [
               'attribute'=>'created_by',
               'value' => $generalObj->showUserCU($model->created_by)
            ],
            [
               'attribute'=>'updated_at',
               'value' => $generalObj->showTime($model->updated_at)
            ],
            [
               'attribute'=>'updated_by',
               'value' => $generalObj->showUserCU($model->updated_by)
            ]
        ],
    ]) ?>

</div>
