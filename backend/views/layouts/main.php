<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DascbordAsset;
use backend\assets\DascbordAssetAR;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\General;

//Create General Obj
$generalObj = new General();
 if(Yii::$app->language=='ar')
 {
   DascbordAssetAR::register($this);
 }
 else {
  DascbordAsset::register($this);
 }
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" >
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body  class="hold-transition skin-black sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
<?=$this->render('header.php',['generalObj'=>$generalObj])?>

  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
   <!-- Left Menu -->
    <?=$this->render('leftSide.php',['generalObj'=>$generalObj])?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=Yii::t('yii','Dashboard')?>
        <small><?=Yii::t('yii','Control panel')?></small>
      </h1>
      <ol class="breadcrumb">
        <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
      </ol>
    </section>

   

    <!-- Content -->
    <?=$this->render('rightSide.php',['content' => $content,'generalObj'=>$generalObj])?>
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer Page -->
  <?=$this->render('footer.php',['generalObj'=>$generalObj])?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>