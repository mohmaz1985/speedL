<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use backend\models\Services;

/* @var $this yii\web\View */
/* @var $model backend\models\Services */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('yii','Management');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-hover">
    <?

        foreach($model as $i => $result ){ ?>
          <tr>
          <td ><?=$result->title?></td>
          
          
          <?= $form->field($result, "old_order_recorder")->hiddenInput(['value'=>$result->order_recorder])->label(false) ?>

          <td >
            <?php
              $dataList=ArrayHelper::map(Services::find()->where(['lang' => Yii::$app->language])->asArray()->all(), 'order_recorder', 'order_recorder');
              echo $form->field($result, "order_recorder")->dropDownList($dataList, 
                       ['prompt'=>'-swap with-']) ->label(false)
            ?>
          </td>
          <td>
            <?= Html::a(Yii::t('yii','Update'), ['services/update-order', 'id' => $result->id], [
                'class'=>[ 'btn btn-primary'],
                'data' => [
                    //'confirm' => Yii::t('yii','Confirm Recover'),
                    'method' => 'post',
                ],
            ]) ?>
          </td>
          <td >
          <?= Html::a(Yii::t('yii','Delete From Database'), ['services/delete-from-database', 'id' => $result->id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => Yii::t('yii','Confirm Delete'),
                  'method' => 'post',
              ],
          ]) ?>


          </td>
          <td >
            <?= Html::a(Yii::t('yii','Recover'), ['services/recover', 'id' => $result->id], [
                'class'=>[ ($result->status==2) ? 'btn btn-success' : 'btn btn-primary disabled'],
                'data' => [
                    'confirm' => Yii::t('yii','Confirm Recover'),
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
