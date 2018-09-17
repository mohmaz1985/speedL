<?php
use yii\helpers\Html;
use common\models\General;
use common\models\EncrptionDecription;
use backend\models\About;
use backend\models\Services;
use backend\models\News;
use backend\models\Partners;
use backend\models\Contact;

/* @var $this yii\web\View */

//Create General Obj
$generalObj = new General();

 $generalObj->visitorNumber('update');
 
// Create security Parameter Obj
$securityParameter = new EncrptionDecription();

$this->title = $generalObj->siteInformationData('title');
?>
<!-- Section 1 -->
<div class="row section1 text-justify">
    <?php
        $listAboutHome = About::find()
              ->where(['status'=>1,'showInHomePage'=>'1','publish'=>'1','lang'=>Yii::$app->language])
              ->orderBy(['order_recorder'=>SORT_DESC])
              ->one();

              if($listAboutHome){?>
                    <h1><?=$listAboutHome['title']?></h1>
                    <div class=""><?=$listAboutHome['description']?></div>
                    <div><a href="index.php?r=site/about"><?=Yii::t('yii','READ MORE')?></a></div>
             <?php }else{?>
                    <h1 class="alert alert-danger"><?=Yii::t('yii','No Data Found')?></h1>
             <?php }


    ?>
</div>
<!-- End Section 1 -->

<!-- Section 2 -->
<div class="row section2">
    <div class="row topSection"><h1><?=Yii::t('yii','Services')?></h1></div>

    <div class="row section2Data">
        <div class="col-lg-4 col-md-4">
            <div class="row topImage">
            <?=Html::img('@web/images/img_vsat.jpg', ['alt'=>'project', 'class'=>'img-responsive section2ImageStyle'])?>
            </div>
            <div class="row section2Box">
                <?php
                  if(Yii::$app->language=='ar')
                    $listVSATCat = 12;
                  else
                    $listVSATCat = 11;
                $listVSAT = Services::find()
                ->where(['categories'=>$listVSATCat,'status'=>1,'showInHomePage'=>'1','publish'=>'1','lang'=>Yii::$app->language])
                ->orderBy(['order_recorder'=>SORT_DESC])
                ->one();

                if($listVSAT){

                  $numberofword = '300';
                  $string = strip_tags($listVSAT['description']);
                  $idValue=$securityParameter->doEncrypt(utf8_decode($listVSAT['categories']));
                  if (strlen($string) > $numberofword) {

                      // truncate string
                      $stringCut = substr($string, 0, $numberofword);

                      // make sure it ends in a word so assassinate doesn't become ass...
                      $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                  }

                    ?>
                    <div class="row box1">
                        <h1><?=$listVSAT['title']?></h1>
                    </div>
                     <div class="row Section2Text ">
                        <p><?=$string?></p>
                    </div>
                    <div class="row box1ReadMore"><a href="index.php?r=site/services&box=1"><?=Yii::t('yii','Read More')?></a></div>
                <?php }else{?>
                    <h1 class="alert alert-danger"><?=Yii::t('yii','No Data Found')?></h1>
                <?php }
                ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
          
          <div class="row topImage">
            <?=Html::img('@web/images/img_voip.jpg', ['alt'=>'project', 'class'=>'img-responsive section2ImageStyle'])?>
            </div>
            <div class="row section2Box">
                <?php
                if(Yii::$app->language=='ar')
                    $listVSAT2Cat = 20;
                  else
                    $listVSAT2Cat = 16;
                $listVSAT2 = Services::find()
                ->where(['categories'=>$listVSAT2Cat,'status'=>1,'showInHomePage'=>'1','publish'=>'1','lang'=>Yii::$app->language])
                ->orderBy(['order_recorder'=>SORT_DESC])
                ->one();

                if($listVSAT2){

                  $numberofword = '300';
                  $string = strip_tags($listVSAT2['description']);
                  $idValue=$securityParameter->doEncrypt(utf8_decode($listVSAT2['categories']));
                  if (strlen($string) > $numberofword) {

                      // truncate string
                      $stringCut = substr($string, 0, $numberofword);

                      // make sure it ends in a word so assassinate doesn't become ass...
                      $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                  }

                    ?>
                    <div class="row box2">
                        <h1><?=$listVSAT2['title']?></h1>
                    </div>
                     <div class="row Section2Text text-justify">
                        <p><?=$string?></p>
                    </div>
                    <div class="row box2ReadMore"><a href="index.php?r=site/services&box=2"><?=Yii::t('yii','Read More')?></a></div>
                <?php }else{?>
                    <h1 class="alert alert-danger"><?=Yii::t('yii','No Data Found')?></h1>
                <?php }
                ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="row topImage">
            <?=Html::img('@web/images/img_project.jpg', ['alt'=>'project', 'class'=>'img-responsive section2ImageStyle'])?>
            </div>
            <div class="row section2Box">
                <?php
                if(Yii::$app->language=='ar')
                    $listVSAT3Cat = 21;
                  else
                    $listVSAT3Cat = 17;

                $listVSAT3 = Services::find()
                ->where(['categories'=>$listVSAT3Cat,'status'=>1,'showInHomePage'=>'1','publish'=>'1','lang'=>Yii::$app->language])
                ->orderBy(['order_recorder'=>SORT_DESC])
                ->one();

                if($listVSAT3){

                  $numberofword = '300';
                  $string = strip_tags($listVSAT3['description']);
                  $idValue=$securityParameter->doEncrypt(utf8_decode($listVSAT3['categories']));
                  if (strlen($string) > $numberofword) {

                      // truncate string
                      $stringCut = substr($string, 0, $numberofword);

                      // make sure it ends in a word so assassinate doesn't become ass...
                      $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                  }

                    ?>
                    <div class="row box3">
                        <h1><?=$listVSAT3['title']?></h1>
                    </div>
                     <div class="row Section2Text text-justify">
                        <p><?=$string?></p>
                    </div>
                    <div class="row box3ReadMore"><a href="index.php?r=site/services&box=3"><?=Yii::t('yii','Read More')?></a></div>
                <?php }else{?>
                    <h1 class="alert alert-danger"><?=Yii::t('yii','No Data Found')?></h1>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div> 
<!-- End Section 2 -->

<!-- Section 3 -->
<div class="row section3">
    <div class="row topSection"><h1><?=Yii::t('yii','Latest News')?></h1></div>
    <div class="row">
      <!-- data-slide="2" data-interval="2000" data-speed="600" data-animator="lazy" -->
        <div class="resCarousel" data-items="1-1-2-3" >
            <div class="resCarousel-inner">
                <?php
                    $countNews = News::find()
                    ->where(['status'=>1,'showInHomePage'=>'1','publish'=>'1','lang'=>Yii::$app->language])
                    ->count();

                    $listNews = News::find()
                    ->where(['status'=>1,'showInHomePage'=>'1','publish'=>'1','lang'=>Yii::$app->language])
                    ->orderBy(['order_recorder'=>SORT_DESC])
                    ->all();

                    if($countNews>0){
                        foreach($listNews as $i=>$result ){
                            $numberofword = '300';
                            $string = strip_tags($result->description);
                              $idValue=$securityParameter->doEncrypt(utf8_decode($result->id));
                              if (strlen($string) > $numberofword) {

                                  // truncate string
                                  $stringCut = substr($string, 0, $numberofword);

                                  // make sure it ends in a word so assassinate doesn't become ass...
                                  $string = substr($stringCut, 0, strrpos($stringCut, ' '));
                              }
                        ?>

                            <div class="item">
                              <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                <div class="row boxData">
                                    <?php
                                        if(!empty($result->image) && $result->image!='-'){ ?>
                                        <div class="row imageView">
                                        <?php echo Html::img('../../backend/web/'.$result->image,['class'=>'img-responsive imgFull']);?>
                                        </div>
                                       <?php } 

                                    ?>
                                  <h1 class="newsText">
                                    <a href="index.php?r=site/news&id=<?=$idValue?>">
                                      <?= Html::encode($result->title) ?> 
                                    </a>
                                  </h1>
                                  <p class="newsText "><?= $string ?></p>
                                  <!-- <span class="readMore">
                                            <a href="index.php?r=site/news&id=<?=$idValue?>"><?=Yii::t('yii','Read More')?></a>
                                  </span> -->
                                </div>
                              </div>
                                <!-- <div class="tile" >
                                    <div class="row imageView">
                                         <?php
                                            if(!empty($result->image) && $result->image!='-'){
                                            echo Html::img('../../backend/web/'.$result->image,['class'=>'img-responsive imgFull']);
                                            }else{
                                                //echo Html::img('../../backend/web/test.jpg',['class'=>'img-responsive imgFull']); ?>
                                                
                                                  <div><h3 class="carousel-caption"><?=$result->title;?></h3> </div>
                                           <?php } ?>
                                           <div class="row textView text-justify"><?=$string?></div>
                                            <span class="readMore">
                                            <a href="index.php?r=site/news&id=<?=$idValue?>"><?=Yii::t('yii','Read More')?></a>
                                            </span>
                                    </div>
                                </div> -->
                            </div>
                        <?php }
                    }else{?>
                        <h1 class="alert alert-danger"><?=Yii::t('yii','No Data Found')?></h1>
                    <?php }
                ?>
            </div>
            <button class='btn btn-default leftRs'>
                <span class="glyphicon glyphicon-menu-left"></span>
            </button>
            <button class='btn btn-default rightRs'>
                <span class="glyphicon glyphicon-menu-right"></span>
            </button>
        </div>
    </div>
</div>

<!-- Section 4 -->
<div class="row section4">
    <div class="row topSection"><h1>Tech Partners</h1></div>
    <div class="row">
        <!--  data-interval="2000" data-speed="600" data-animator="lazy" -->
        <div class="resCarousel" data-items="2-2-4-4" data-slide="2">
            <div class="resCarousel-inner">


                <?php
                    $countPartners = Partners::find()
                    ->where(['status'=>1,'publish'=>'1','lang'=>Yii::$app->language])
                    ->count();

                    $listPartners = Partners::find()
                    ->where(['status'=>1,'publish'=>'1','lang'=>Yii::$app->language])
                    ->orderBy(['order_recorder'=>SORT_DESC])
                    ->all();

                    if($countNews>0){ 
                        foreach($listPartners as $i=>$result ){ ?>
                        <div class="item">
                              <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                <div class="row imageView">

                                        
                                        <a href="<?=$result->link;?>" target="_blank">
                                         <?php
                                            if(!empty($result->image) && $result->image!='-'){

                                              $imgHover ='../../backend/web/'.$result->image_hover;
                                              $imgNormal ='../../backend/web/'.$result->image;
                                            echo Html::img('../../backend/web/'.$result->image,['class'=>'img-responsive imgFull','onmouseover'=>'this.src="'.$imgHover.'"','onmouseout'=>'this.src="'.$imgNormal.'"']);
                                            }else{
                                                echo '<h1>'.$result->title.'</h1>';
                                            }
                                        ?>
                                        </a>
                                    </div>
                              </div>
                        </div>
                            <!-- <div class="item">
                                <div class="tile" >
                                    <div class="row imageView">
                                        <a href="<?=$result->link;?>" target="_blank">
                                         <?
                                            if(!empty($result->image) && $result->image!='-'){
                                            echo Html::img('../../backend/web/'.$result->image,['class'=>'img-responsive imgFull']);
                                            }else{
                                                echo '<h1>'.$result->title.'</h1>';
                                            }
                                        ?>
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                      <?php  }
                     }?>

                
            </div>
            <button class='btn btn-default leftRs'>
                <span class="glyphicon glyphicon-menu-left"></span>
            </button>
            <button class='btn btn-default rightRs'>
                <span class="glyphicon glyphicon-menu-right"></span>
            </button>
        </div>
    </div>
</div>

<!-- Section 5 -->
<div class="row section5">
    <div class="">
        <?php
                    $countContact = Contact::find()
                    ->where(['status'=>1,'publish'=>'1','lang'=>Yii::$app->language])
                    ->count();

                    $listContact = Contact::find()
                    ->where(['status'=>1,'publish'=>'1','lang'=>Yii::$app->language])
                    ->orderBy(['order_recorder'=>SORT_DESC])
                    ->one();
        ?>
        <p><?=$listContact['description']?></p>
         <a href="index.php?r=site/contact"><button type="button" class="btn contactForm"><?=Yii::t('yii','Contact Form')?></button></a>
    </div>
</div>

