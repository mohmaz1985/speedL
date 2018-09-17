<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\General;

/* @var $this yii\web\View */
/* @var $model app\models\Partners */

// Create General instance
$generalObj = new General();

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-view">

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
            'title',
            [
              'attribute' => 'description',
              'format' => 'raw',
              
            ],
            [
              'attribute' => 'link',
              'format' => 'raw',
              
            ],
            [
                'attribute'=>'image',
               'format' => ['image',['width'=>'150','height'=>'150']],
            ],
            [
                'attribute'=>'image_hover',
               'format' => ['image',['width'=>'150','height'=>'150']],
            ],
            [
               'attribute'=>'publish',
               'value' => $generalObj->showPublish($model->publish)
            ],
            [
               'attribute'=>'created_at',
               'value' => $generalObj->showTime($model->created_at)
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
