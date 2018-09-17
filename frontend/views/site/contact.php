<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use backend\models\Contact;

$this->title = Yii::t('yii','Contact Us');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact contactView">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
                    $countContact = Contact::find()
                    ->where(['status'=>1,'publish'=>'1','lang'=>Yii::$app->language])
                    ->count();

                    $listContact = Contact::find()
                    ->where(['status'=>1,'publish'=>'1','lang'=>Yii::$app->language])
                    ->orderBy(['order_recorder'=>SORT_DESC])
                    ->one();
    ?>
    <p><?=$listContact['description']?><br/></p>
    <p><u><b>
        <?=Yii::t('yii','If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.')?></b></u>
    </p>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
          <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <?= Yii::$app->session->getFlash('success') ?>
          </div>
          <?php endif; ?>
          <?php if (Yii::$app->session->hasFlash('error')): ?>
          <div class="alert alert-danger alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <?= Yii::$app->session->getFlash('error') ?>
          </div>
          <?php endif; ?>
    <div class="row contactViewForm">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('yii','Send'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
