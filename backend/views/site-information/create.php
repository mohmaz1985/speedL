<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SiteInformation */

$this->title = Yii::t('yii','Create').' '.Yii::t('yii','Site Information');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Site Information'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
