<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteInformation */

$this->title = Yii::t('yii','Update').' '.Yii::t('yii','Site Information').' :' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Site Information'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii','Update');
?>
<div class="site-information-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
