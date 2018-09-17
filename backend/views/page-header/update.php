<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PageHeader */

$this->title = 'Update Page Header: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Page Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-header-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
