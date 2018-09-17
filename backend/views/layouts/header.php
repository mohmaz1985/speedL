<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>SLFTT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>SLFTT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- <a href="#" class="languageSelect" >
        <span class="languageSelect"><b> <?=Yii::t('yii','Select Language')?>: </b>
            <?php
                foreach (Yii::$app->params['languages'] as $key => $language) { 
                    echo '<span class="language" id="'.$key.'">'.$language.' | </span>';
                }
                $cookies1 = Yii::$app->request->cookies;
                //print_r($cookies1);

                if ($cookies1->has('lang')){
                    $cookieValue = $cookies1->getValue('lang');
                    //echo 'value : '.$cookieValue;
                }
                //echo Yii::$app->language;

            ?>
        </span>
      </a> -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <?php
                if(Yii::$app->user->isGuest){
                    Yii::$app->urlManager->createUrl('site/login');

                }else{
            ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span >
                <?=$generalObj->showUserCU(Yii::$app->user->id)?>
                <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=Yii::$app->user->identity->image?>" class="img-circle" alt="User Image">

                <p>
                  <?=$generalObj->showUserJobTitle(Yii::$app->user->id)?>
                  <small><?=Yii::t('yii','Member since')?>: <?=date('m/d/Y h:i:s a', Yii::$app->user->identity->created_at);?></small>
                  <small><?=Yii::t('yii','Last login')?>: <?=date('m/d/Y h:i:s a', Yii::$app->user->identity->lastLogin);?></small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <?= yii\helpers\Html::a(Yii::t('yii','Profile'), ['users-management/profile', 'id' => Yii::$app->user->identity->id], [
                        'class' => 'btn btn-default btn-flat',
                        'data' => [
                        'method' => 'post',
                   ],]) ?>
                </div>
                <div class="pull-right">
                  <a href="<?=Yii::$app->urlManager->createUrl('site/logout');?>" data-method="post" class="btn btn-default btn-flat"><?=Yii::t('yii','Sign out')?></a>
                </div>
              </li>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
</header>