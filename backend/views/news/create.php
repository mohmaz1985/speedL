<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = Yii::t('yii','Create').' '.Yii::t('yii','News') ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
