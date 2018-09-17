<?php

use yii\helpers\Html;
use backend\models\Services;
use backend\models\Categories;
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

if(!empty($_GET['box'])){
	//$idValue = $securityParameter->doDecrypt(utf8_decode($_GET['id']));?>
	<input type="hidden" id="goToDivCat" value="<?=$_GET['box']?>" />
<?php }else{?>
	<input type="hidden" id="goToDivCat" value="" />
<?php }
      // Select Services Categories
	  $countListCategories = Categories::find()
            ->where(['lang'=>Yii::$app->language,'modelID'=>8,'showINList'=>'1'])
            ->orderBy(['id'=>SORT_ASC])
            ->count();


      $listCategories = Categories::find()
            ->where(['lang'=>Yii::$app->language,'modelID'=>8,'showINList'=>'1'])
            ->orderBy(['id'=>SORT_ASC])
            ->all();


$this->title = Yii::t('yii','Services');
?>
<div class="site-services">
	<?php 
		if($countListCategories>0)
		{
			$styleValue=0;
			foreach ($listCategories as $key => $result) {
					if($key>2)
						$styleValue=1;
					else
						$styleValue = $key+1;
				?>
					<div class="row servicesCategories">
						<div id="Cat<?=$styleValue?>" class="row box<?=$styleValue?>" >
							<h1>
							<?=Html::encode($generalObj->getCategoriesName($result->id))?>
							</h1>
						</div>
						<div class=" servicesText">
						<?php
							// Select data Services
							//,'showInHomePage'=>0
						      $countListServices = Services::find()
						            ->where(['lang'=>Yii::$app->language,'status'=>1,'publish'=>'1','categories'=>$result->id])
						            ->orderBy(['order_recorder'=>SORT_DESC])
						            ->count();


						      $listServices = Services::find()
						            ->where(['lang'=>Yii::$app->language,'status'=>1,'publish'=>'1','categories'=>$result->id])
						            ->orderBy(['order_recorder'=>SORT_DESC])
						            ->all();
						       if($countListServices>0)
						       {
						       		foreach ($listServices as $key => $servicesResult) {
						       			if(!empty($idValue) && $idValue==$servicesResult->id){
											$classIn='in';
										}else{
											$classIn='';
										}

						       		?>
									<div  class="panel-body">
							            <div class="panel-group" id="accordion">
							                <div class="panel panel-default">
							                    <div class="panel-heading">
							                        <h4 class="panel-title">
							                        <a 	href="#<?=$servicesResult->id?>" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
							                        <?=Html::encode($servicesResult->title)?>
							                        </a>
							                        </h4>
							                    </div>
							                    <div id="<?=$servicesResult->id?>" class="panel-collapse collapse <?=$classIn?>">
							                        <div class="panel-body">
							                            <p>
							                            	<?=$servicesResult->description?>
							                            </p>
							                        </div>
							                    </div>
							                </div>
							          </div>
								    </div>
						       		<?php }
						       }
						?>
						</div>
					</div>
		   <?php }
		}
	?>
</div>

