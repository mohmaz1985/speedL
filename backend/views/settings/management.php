<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model backend\models\AboutUs */
/* @var $form yii\widgets\ActiveForm */
$titleValue='title'.strtoupper(Yii::$app->language);
$this->title = Yii::t('yii','Management');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-hover">
    <?

        foreach($model as $i => $result ){ ?>
          <tr>
          <td ><?=$result->$titleValue?></td>

          <td >
            <?= Html::a(Yii::t('yii','Recover'), ['settings/recover', 'id' => $result->id], [
                'class'=>[ ($result->status==2) ? 'btn btn-danger' : 'btn btn-primary disabled'],
                'data' => [
                    'confirm' => 'confirm_recover',
                    'method' => 'post',
                ],
            ]) ?>
          </td>
          </tr>
    <?
        }
    ?>
    </table>

    <?php ActiveForm::end(); ?>
    <?= LinkPager::widget([
    'pagination' => $pagination,
    ]);?>

</div>
