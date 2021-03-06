<?php
namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class SpeedLinkAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       'css/bootstrap.min.css',
       'css/font-awesome.min.css',
       'css/ionicons.min.css',
       'css/site_2.css',
    ];
    public $js = [
        
        'js/jquery.min.js',
        'js/jquery-ui.min.js',
        'js/bootstrap.min.js',
        'js/resCarousel.min.js',
        'js/angular/angular.min.js',
        'js/angular/angular-route.js',
        'js/angular/services.js',
        'js/angular/controllers.js',
        'js/angular/filters.js',
        'js/angular/directives.js',
        'js/site_2.js',

    ];
    public $depends = [
        //'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
?>