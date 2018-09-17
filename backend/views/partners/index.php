<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii','Partners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('yii','Create').' '.Yii::t('yii','Partners'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'description:ntext',
            [
                'attribute'=>'image',
               'format' => ['image',['width'=>'150','height'=>'150']],
            ],
            [
               'attribute'=>'image_hover',
               'format' => ['image',['width'=>'150','height'=>'150']],
            ],
            // 'files:ntext',
            // 'videos:ntext',
            // 'links:ntext',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
