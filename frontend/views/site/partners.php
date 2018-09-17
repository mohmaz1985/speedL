<?php

use yii\helpers\Html;
use backend\models\Partners;
use common\models\General;
/* @var $this yii\web\View */

//Create General Obj
$generalObj = new General();


// select data AboutUS
      $countListAboutUS = Partners::find()
            ->where(['lang'=>Yii::$app->language,'status'=>1,'publish'=>'1'])
            ->orderBy(['order_recorder'=>SORT_DESC])
            ->count();


      $listAboutUS = Partners::find()
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

					$imgHover ='../../backend/web/'.$result->image_hover;
                    $imgNormal ='../../backend/web/'.$result->image;
				 ?>
					<div class="row partnersView">
						<div class="col-md-4">
							<a href="<?=$result->link?>" target="_blank"><?=Html::img('../../backend/web/'.$result->image,['class'=>'img-responsive imageView','onmouseover'=>'this.src="'.$imgHover.'"','onmouseout'=>'this.src="'.$imgNormal.'"'])?>
							</a>
						</div>
						<div class="col-md-8 text-justify">
							<h1><?= Html::encode($result->title) ?></h1>
							<p><?= $result->description ?></p>
						</div>
						<hr class="hrLine" />
					</div>
				<?php
		    }
		}
	?>   
</div>
