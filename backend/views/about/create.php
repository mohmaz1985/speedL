<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\About */

$this->title = Yii::t('yii','Create').' '.Yii::t('yii','About Us') ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','About Us'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
