<?php

use common\models\General;
/* @var $this yii\web\View */

//Create General Obj
$generalObj = new General();

$this->title = $generalObj->siteInformationData('title');
?>
<div class="site-index">
    <div class="row center-block">
        
        <div class="panel panel-default">
          <div class="panel-heading"><h3><?=Yii::t('yii','User Information')?></h3></div>
            <div class="panel-body">
              <span><b><?=Yii::t('yii','Name')?>:</b> <?=$generalObj->showUserCU(Yii::$app->user->id)?><br/><br/></span>
              <span><b><?=Yii::t('yii','Job Title')?>:</b> <?=$generalObj->showUserJobTitle(Yii::$app->user->id)?><br/><br/></span>
              <span><b><?=Yii::t('yii','Member since')?>:</b> <?=date('m/d/Y h:i:s a', Yii::$app->user->identity->created_at);?><br/><br/></span>
              <span><b><?=Yii::t('yii','Last Login')?>:</b> <?=date('m/d/Y h:i:s a', Yii::$app->user->identity->lastLogin);?><br/><br/></span>
              <div class="pull-left">
                <div class="pull-left">
                  <?= yii\helpers\Html::a(Yii::t('yii','Profile'), ['users-management/profile', 'id' => Yii::$app->user->identity->id], [
                        'class' => 'btn btn-default btn-flat',
                        'data' => [
                        'method' => 'post',
                   ],]) ?>
                </div>
                </div>
                <div class="pull-right">
                  <a href="<?=Yii::$app->urlManager->createUrl('site/logout');?>" data-method="post" class="btn btn-default btn-flat"><?=Yii::t('yii','Sign out')?></a>
                </div>
            </div>
        </div>
</div>
