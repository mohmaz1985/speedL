<?php

use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use backend\models\News;
use common\models\General;
use common\models\EncrptionDecription;
/* @var $this yii\web\View */

//Create General Obj
$generalObj = new General();

// Create security Parameter Obj
$securityParameter = new EncrptionDecription();

if(isset($_GET['id']))
{
	$idValueShow = $securityParameter->doDecrypt(utf8_decode($_GET['id']));
}

// select data AboutUS
      $countListNews = News::find()
            ->where(['lang'=>Yii::$app->language,'status'=>1,'publish'=>'1'])
            ->orderBy(['order_recorder'=>SORT_DESC])
            ->count();


      $pagination = new Pagination(['totalCount' => $countListNews,'pageSize'=>$generalObj->getDataPerPage(3)]);

      $listNews = News::find()
            ->where(['lang'=>Yii::$app->language,'status'=>1,'publish'=>'1'])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy(['order_recorder'=>SORT_DESC])
            ->all();
$this->title = Yii::t('yii','About');
?>
<div class="site-news">
	<?php 
		if($countListNews>0 && !isset($_GET['id']))
		{ ?>
			<div class="row newsView">
			<?php
			foreach ($listNews as $key => $result) { 
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
						<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12">
						    <div class="boxData">
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
								<p class="newsText text-justify"><?= $string ?></p>
							</div>
						</div>
				<?php
		    }?>
		    </div>
		    <div>
		    	<?php if(!isset($_GET['id']))
                {
                      echo "<div class='row text-center'>";
                      echo  LinkPager::widget([
                            'pagination' => $pagination,
                            ]);
                      echo "</div>";
                }?>
		    </div>
		<?php }else{ 
			$listNews = News::find()
            ->where(['lang'=>Yii::$app->language,'status'=>1,'publish'=>'1','id'=>$idValueShow])
            ->orderBy(['order_recorder'=>SORT_DESC])
            ->one();

		?>
			<div class="newsViewDetails">
				<?php
				if(!empty($listNews['image']) && $listNews['image']!='-'){ ?>
                <div class="row imageView">
                <?php echo Html::img('../../backend/web/'.$listNews['image'],['class'=>'img-responsive imgFull']);?>
                </div>
               <?php } ?>
				<h1 class="newsText">
						<?= Html::encode($listNews['title']) ?>	
				</h1>
				<p class="newsText text-justify"><?=$listNews['description'] ?></p>
			</div>
		<?php }
	?>   
</div>
