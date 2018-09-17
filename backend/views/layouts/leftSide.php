<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
                if(Yii::$app->user->isGuest){
                    echo '<img src="img/avatar5.png" class="img-circle" alt="User Image" />';
                }else{
                    echo '<img src="'.Yii::$app->user->identity->image.'" class="img-circle" alt="User Image" />';
                }
          ?>
        </div>
        <div class="pull-left info">
          
              <?php
                    if(Yii::$app->user->isGuest)
                    {
                     echo '<br/>';
                     echo ' <a href="#"><i class="fa fa-circle text-muted"></i> '.Yii::t('yii','Offline').'</a>';
                    }
                    else{
                     echo '<p>'.Yii::$app->user->identity->username.'</p>';
                     echo ' <a href="#"><i class="fa fa-circle text-success"></i> '.Yii::t('yii','Online').'</a>';
                    }
               ?>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><?=Yii::t('yii','MAIN NAVIGATION')?></li>
        <li class="treeview <?=$generalObj->leftMenuOpen("")?>">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span><?=Yii::t('yii','Dashboard')?></span>
          </a>
        </li>

        <!-- About -->
        <li class="treeview <?=$generalObj->leftMenuOpen("about")?>">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span><?=Yii::t('yii','About Us')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=about"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','About Us')?></a></li>
            <li><a href="index.php?r=about/create"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Add')?></a></li>
            <li><a href="index.php?r=about/data-per-page"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Data per page')?></a></li>
            <li><a href="index.php?r=about/management"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Management')?></a></li>
          </ul>
        </li>
        <!-- Categories -->
        <li class="treeview <?=$generalObj->leftMenuOpen("categories")?>">
          <a href="#">
            <i class="fa fa-list"></i>
            <span><?=Yii::t('yii','Categories')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=categories"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Categories')?></a></li>
            <li><a href="index.php?r=categories/create"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Add')?></a></li>
            <li><a href="index.php?r=categories/data-per-page"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Data per page')?></a></li>
            <li><a href="index.php?r=categories/list-of-categories"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','List Of Categories')?></a></li>
          </ul>
        </li> 
        <!-- Contact Us -->
        <li class="treeview <?=$generalObj->leftMenuOpen("contact")?>">
          <a href="#">
            <i class="fa fa-phone-square"></i>
            <span><?=Yii::t('yii','Contact Us')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=contact"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Contact Us')?></a></li>
            <li><a href="index.php?r=contact/create"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Add')?></a></li>
            <li><a href="index.php?r=contact/data-per-page"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Data per page')?></a></li>
            <li><a href="index.php?r=contact/management"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Management')?></a></li>
          </ul>
        </li>      
        <!-- News -->
        <li class="treeview <?=$generalObj->leftMenuOpen("news")?>">
          <a href="#">
            <i class="fa fa-clipboard"></i>
            <span><?=Yii::t('yii','News')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=news"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','News')?></a></li>
            <li><a href="index.php?r=news/create"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Add')?></a></li>
            <li><a href="index.php?r=news/data-per-page"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Data per page')?></a></li>
            <li><a href="index.php?r=news/management"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Management')?></a></li>
          </ul>
        </li>
        <!-- Partners -->
        <li class="treeview <?=$generalObj->leftMenuOpen("partners")?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span><?=Yii::t('yii','Partners')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=partners"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Partners')?></a></li>
            <li><a href="index.php?r=partners/create"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Add')?></a></li>
            <li><a href="index.php?r=partners/data-per-page"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Data per page')?></a></li>
            <li><a href="index.php?r=partners/management"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Management')?></a></li>
          </ul>
        </li>
        <!-- Services -->
        <li class="treeview <?=$generalObj->leftMenuOpen("services")?>">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span><?=Yii::t('yii','Services')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=services"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Services')?></a></li>
            <li><a href="index.php?r=services/create"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Add')?></a></li>
            <li><a href="index.php?r=services/data-per-page"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Data per page')?></a></li>
            <li><a href="index.php?r=services/management"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Management')?></a></li>
          </ul>
        </li>
        <!-- Site Information -->
        <?php

            if(!empty(Yii::$app->language) && Yii::$app->language=='ar')
              $id=1;
            else if(!empty(Yii::$app->language) && Yii::$app->language=='en')
              $id=2;

        ?>
        <li class="treeview <?=$generalObj->leftMenuOpen("site-information")?>">
          <a href="#">
            <i class="fa fa-info-circle"></i>
            <span><?=Yii::t('yii','Site Information')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=site-information/update&id=<?=$id ?>"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Site Information')?></a></li>
          </ul>
        </li>
        <!-- page header -->
        <li class="treeview <?=$generalObj->leftMenuOpen("page-header")?>">
          <a href="#">
            <i class="fa fa-image"></i>
            <span><?=Yii::t('yii','Page Header')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=page-header"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Page Header')?></a></li>
          </ul>
        </li>
        <!-- Users Management -->
        <li class="treeview <?=$generalObj->leftMenuOpen("users-management")?>">
          <a href="#">
            <i class="fa fa-user-plus"></i>
            <span><?=Yii::t('yii','Users Managements')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=users-management"><i class="fa fa-circle-o"></i> 
            <?=Yii::t('yii','Users List')?></a></li>
            <li><a href="index.php?r=users-management/create"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Add')?></a></li>
            <li><a href="index.php?r=users-management/data-per-page"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Data per page')?></a></li>
          </ul>
        </li>
        <!-- Settings -->
        <li class="treeview <?=$generalObj->leftMenuOpen("settings")?>">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span><?=Yii::t('yii','Settings')?></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?r=settings"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Settings')?></a></li>
            <li><a href="index.php?r=settings/create"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Add')?></a></li>
            <li><a href="index.php?r=settings/data-per-page"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Data per page')?></a></li>
            <li><a href="index.php?r=settings/management"><i class="fa fa-circle-o"></i> <?=Yii::t('yii','Management')?></a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>