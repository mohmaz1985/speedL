<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('yii','Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?=Yii::t('yii','Please fill out the following fields to login')?>:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(Yii::t('yii','Username')) ?>

                <?= $form->field($model, 'password')->passwordInput()->label(Yii::t('yii','Password')) ?>

                <?php //$form->field($model, 'rememberMe')->checkbox(); ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('yii','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
