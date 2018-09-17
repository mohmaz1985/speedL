<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\General;
/* @var $this yii\web\View */
/* @var $model app\models\SiteInformation */

// Create General instance
$generalObj = new General();


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Site Information'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-information-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'adminEmail:email',
            'footerInfo:ntext',
            'metaTag:ntext',
            'youtube',
            'twitter',
            'facebook',
            'linkedin',
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
