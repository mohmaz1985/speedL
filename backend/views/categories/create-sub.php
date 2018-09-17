<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Categories */



$this->title = Yii::t('yii','Create').' '. Yii::t('yii','Sub Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-sub', [
        'model' => $model,
        'model2' => $model2,
    ]) ?>

</div>
