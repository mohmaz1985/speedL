<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\SpeedLinkAsset;
use frontend\assets\SpeedLinkAssetAR;
use common\widgets\Alert;
use common\models\General;
use common\models\EncrptionDecription;
use backend\models\Services;
use \yii\helpers\Url;

//Create General Obj
$generalObj = new General();

// Create security Parameter Obj
$securityParameter = new EncrptionDecription();

 if(Yii::$app->language=='ar')
 {
   SpeedLinkAssetAR::register($this);
   $languageID='en';
   $navBarDirection='navbar-left';
   $numberofword = '600';
 }
 else {
  SpeedLinkAsset::register($this);
  $languageID='ar';
  $navBarDirection='navbar-right';
  $numberofword = '200';
 }

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Header -->
<header>
    <div class="row wrapperHeader"></div>
    <?php
    $aboutUsSubMenu = $generalObj->subMainMenuAbout();
    $servicesSubMenu = $generalObj->subMainMenuServices(23);
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/SpeedLinkLogo.png', ['alt'=>'logo', 'class'=>'img-responsive']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
        'innerContainerOptions' => ['class' => 'container-fluid'],
    ]);
    $menuItems = [
        ['label' => '<i class="fa fa-home"></i><br/><span class="menuText">'.Yii::t('yii','Home').'</span>', 'url' => ['/site/index']],
        ['label' => '<i class="fa fa-info-circle"></i><br/><span class="menuText">'.Yii::t('yii','About Us').'</span>', 'url' => ['/site/about'],'items' => $aboutUsSubMenu],
        ['label' => '<i class="fa  fa-newspaper-o"></i><br/><span class="menuText">'.Yii::t('yii','News').'</span>', 'url' => ['/site/news']],
        ['label' => '<i class="fa  fa-connectdevelop"></i><br/><span class="menuText">'.Yii::t('yii','Services').'</span>', 'url' => ['#'],'items'=>$servicesSubMenu],
        ['label' => '<i class="fa  fa-users"></i><br/><span class="menuText">'.Yii::t('yii','TechPartners').'</span>', 'url' => ['/site/partners']],
        ['label' => '<i class="fa  fa-phone"></i><br/><span class="menuText">'.Yii::t('yii','Contact Us').'</span>', 'url' => ['/site/contact']],
        // ['label' => "<span class='language' id='".$languageID."' ><i class='fa  fa-share-square-o'></i><br/>".Yii::t('yii','العربية')."</span>"],

    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav '.$navBarDirection],
        'encodeLabels' => false,
        'activateItems' => true,
        'activateParents' => true,
        'items' => $menuItems,
    ]);
    NavBar::end();


    ?>
</header> 
<!-- End Header -->
<!-- Content -->
<div class="container-fluid">

  <div class="row pageHeader">

    <?php

    $controllerl = Yii::$app->controller;

    if($controllerl->action->id == 'index'){ ?>
      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-speed="700" data-interval="4000" data-animator="lazy">

        <div class="row carousel-caption social">
              <a href="<?=$generalObj->siteInformationData('facebook')?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
              <a href="<?=$generalObj->siteInformationData('twitter')?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
              <a href="<?=$generalObj->siteInformationData('youtube')?>" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
              <a href="<?=$generalObj->siteInformationData('linkedin')?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        </div>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <?php
          $countServices = Services::find()
          ->where(['status'=>1,'showInHeader'=>'1','publish'=>'1','lang'=>Yii::$app->language])
          ->count();

          $listServices = Services::find()
                ->where(['status'=>1,'showInHeader'=>'1','publish'=>'1','lang'=>Yii::$app->language])
                ->orderBy(['order_recorder'=>SORT_DESC])
                ->all();

                if($countServices>0){
                  
                  $next_item = 1;
                  foreach($listServices as $i=>$result ){ 
                    if($i==0)
                    {
                      $activeClass='item active';
                    }else{
                      $activeClass='item';
                    }
                    
                    $string = strip_tags($result->description);
                    $idValue=$securityParameter->doEncrypt(utf8_decode($result->id));

                    //echo 'Image: '.$result->image.'<br/>';
                    if (strlen($string) > $numberofword) {

                        // truncate string
                        $stringCut = substr($string, 0, $numberofword);

                        // make sure it ends in a word so assassinate doesn't become ass...
                        $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                      }
                      ?>
                       <div class="row <?=$activeClass?>  ">
                          <?=Html::img('../../backend/web/'.$result->image,['class'=>'img-responsive'])?>
                          <div class="carousel-caption">
                            <h3><?=$result->title;?></h3>
                            <p  class="text-justify"><?=$string;?></p>
                            <span>
                              <a href="index.php?r=site/services&id=<?=$idValue;?>"><button type="button" class="btn readMore"><?=Yii::t('yii','Read More')?></button></a>
                            </span>
                          </div>
                        </div>
                    <?php 
                  }
                }
        ?>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <?php } else { ?>

          <?php
            echo $generalObj->getPageHeaderImage($controllerl->action->id);
          ?> 
    <?php } ?>
  </div>

  <div class="row">
      <?= $content ?>
  </div>
</div> 
<!-- Content -->
<!-- Section 6 -->
<!-- <div class="row section6">
    <div class="row">
         <p><?=Yii::t('yii','You Are Visitor Number')?></p>
         <span class="number"><?=$generalObj->visitorNumber('view')?></span>
    </div>
</div> -->
<!-- Footer -->

 <footer class="footer">
    <div class="row wrapperHeader"></div>
    <div class="row firstRow">
        <div class="row">
            <a href="<?=$generalObj->siteInformationData('facebook')?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href="<?=$generalObj->siteInformationData('twitter')?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            <a href="<?=$generalObj->siteInformationData('youtube')?>" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
            <a href="<?=$generalObj->siteInformationData('linkedin')?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        </div>
        <div class="row footerMenu">
            <?php
                NavBar::begin([
                    'brandLabel' =>'',
                    'brandUrl' => '',
                    'options' => [
                        'class' => 'navbar navbar-default',
                    ],
                    'innerContainerOptions' => ['class' => 'container-fluid'],
                ]);
                $menuItems = [
                    ['label' => Yii::t('yii','Home').'<span class="paddingFooterMenu"> | </span>', 'url' => ['/site/index']],
                    ['label' => Yii::t('yii','About Us').'<span class="paddingFooterMenu"> | </span>', 'url' => ['/site/about']],
                    ['label' => Yii::t('yii','News').'<span class="paddingFooterMenu"> | </span>', 'url' => ['/site/news']],
                    ['label' => Yii::t('yii','Services').'<span class="paddingFooterMenu"> | </span>', 'url' => ['/site/services']],
                    ['label' => Yii::t('yii','Tech Partners').'<span class="paddingFooterMenu"> | </span>', 'url' => ['/site/partners']],
                    ['label' => Yii::t('yii','Contact Us').'<span class="paddingFooterMenu">  </span>', 'url' => ['/site/contact']],
                    // ['label' => "<span class='language' id='".$languageID."' >".Yii::t('yii','العربية')."</span>"],

                ];
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'encodeLabels' => false,
                    'items' => $menuItems,
                ]);
                NavBar::end();
            ?>
        </div>
    </div>
    <div class="row secondRow">
        <p> &copy; <?= $generalObj->siteInformationData('footerInfo').' '. date('Y') ?></p>
    </div>
</footer> 
<!-- End Footer -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
