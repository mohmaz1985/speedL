<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\General;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


//Create Obj
$generalObj = new General();

$this->title = Yii::t('yii','Categories');
$this->params['breadcrumbs'][] = $this->title;
?>

  <?php if (Yii::$app->session->hasFlash('danger')):?>
    <div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('danger') ?>
    </div>
  <?php endif; ?>
  <?php if (Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('success') ?>
    </div>
  <?php endif; ?>

<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('yii','Create').' '.Yii::t('yii','Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',  
            [
              'attribute' => 'parentid',
              'value'=>'categoriesName.title'
            ],
            [
              'attribute' => 'modelID',
              'value' => 'setteingsModelName.title'.strtoupper(Yii::$app->language),
            ],
            [
              'attribute' => 'addSubCategory',
              'label' => Yii::t('yii','Add Sub Category'),
              'format' => 'raw',
              'value' => function ($data) {
                         return Html::a(Yii::t('yii','Add Sub Category'), ['categories/create-sub', 'parentid' => $data->id]);
                     },
            ],
            //'lang',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

