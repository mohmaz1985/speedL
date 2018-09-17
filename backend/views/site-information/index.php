<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SiteInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii','Site Information');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-information-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=$searchModel->isNewRecord ?>
    <p>
        <?php //= Html::a(Yii::t('yii','Create').' '.Yii::t('yii','Site Information'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'adminEmail:email',
            'footerInfo:ntext',
            'metaTag:ntext',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
