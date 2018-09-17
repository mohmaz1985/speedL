<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <?php if(empty($_GET["r"])){?>
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?=Yii::t('yii','News')?></h3>

            <p><?= Yii::t('yii','News Section')?></p>
          </div>
          <div class="icon">
            <i class="fa fa-clipboard"></i>
          </div>
          <a href="index.php?r=news" class="small-box-footer"><?= Yii::t('yii','Add').' '.Yii::t('yii','News')?> <i class="fa fa-arrow-circle"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?=Yii::t('yii','Services')?></h3>

            <p><?=Yii::t('yii','Services Section')?></p>
          </div>
          <div class="icon">
            <i class="fa fa-briefcase"></i>
          </div>
          <a href="index.php?r=services" class="small-box-footer"><?=Yii::t('yii','Add').' '.Yii::t('yii','Services')?> <i class="fa fa-arrow-circle"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?=Yii::t('yii','Partners')?></h3>

            <p><?=Yii::t('yii','Partners Section')?></p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="index.php?r=partners" class="small-box-footer"><?=Yii::t('yii','Add').''.Yii::t('yii','Partners')?><i class="fa fa-arrow-circle"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?=Yii::t('yii','About Us')?></h3>

            <p> <?=Yii::t('yii','- About Us - Our Team - Mission')?></p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <a href="index.php?r=about" class="small-box-footer"><?=Yii::t('yii','Add').' '.Yii::t('yii','About Us')?> <i class="fa fa-arrow-circle"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <?php } ?>
    <!-- /.row -->
    <!-- Main row -->
    <?=$content;?>
    
    </div>
    <!-- /.row (main row) -->
</section>
<!-- /.content -->