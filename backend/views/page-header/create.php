<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PageHeader */

$this->title = 'Create Page Header';
$this->params['breadcrumbs'][] = ['label' => 'Page Headers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
