<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = Yii::t('yii','Create').' '.Yii::t('yii','Contact Us') ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Contact Us'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
