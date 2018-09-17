<?php

use yii\helpers\Html;
use backend\models\About;
use common\models\General;
use common\models\EncrptionDecription;
/* @var $this yii\web\View */

//Create General Obj
$generalObj = new General();

// Create security Parameter Obj
$securityParameter = new EncrptionDecription();
if(!empty($_GET['id'])){
	$idValue = $securityParameter->doDecrypt(utf8_decode($_GET['id']));?>
	<input type="hidden" id="goToDiv" value="<?=$idValue?>" />
<?php }else{?>
	<input type="hidden" id="goToDiv" value="" />
<?php }

// select data AboutUS
      $countListAboutUS = About::find()
            ->where(['lang'=>Yii::$app->language,'status'=>1,'publish'=>'1'])
            ->orderBy(['order_recorder'=>SORT_DESC])
            ->count();


      $listAboutUS = About::find()
            ->where(['lang'=>Yii::$app->language,'status'=>1,'publish'=>'1'])
            ->orderBy(['order_recorder'=>SORT_DESC])
            ->all();
$this->title = Yii::t('yii','About');
?>
<div class="site-about">
	<?php 
		if($countListAboutUS>0)
		{
			foreach ($listAboutUS as $key => $result) { 
				if($key==0)
				{ ?>
					<div class="row" id="<?=$result->id?>">
						<div class="col-xs-4">
							<?=Html::img('../../backend/web/'.$result->image,['class'=>'img-responsive imgFull'])?>
						</div>
						<div class="col-xs-8">
							<h1><?= Html::encode($result->title) ?></h1>
							<p><?= $result->description ?></p>
						</div>
						
					</div>
					<hr class="hrLine" />
				<?php }else{ ?>
						<div class="row aboutSecondView" id="<?=$result->id?>">
							<?php if(!empty($result->image) && $result->image!=''){ ?>
							<span class="aboutSecondViewText" >
								<?= Html::encode($result->title) ?>
							</span>
							<?php echo Html::img('../../backend/web/'.$result->image,['class'=>'img-responsive imgFull']);
								}else{?>
									<h1><?= Html::encode($result->title) ?></h1>
								<?php }
							?>

							<p><?= $result->description ?></p>
						</div>
						<hr class="hrLine" />
				<?php }
		    }
		}
	?>   
</div>
<div class="row contactFooter">
						<a href="index.php?r=site/contact"><button type="button" class="btn contactForm"><?=Yii::t('yii','Contact Form')?></button></a>
				</div>
