<?php
namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class DascbordAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       'css/bootstrap.min.css',
       'css/font-awesome.min.css',
       'css/ionicons.min.css',
       'css/AdminLTE.min.css',
       'css/_all-skins.min.css',
       'css/site.css',
    ];
    public $js = [
        
        //'js/jquery.min.js',
        'js/jquery-ui.min.js',
        'js/bootstrap.min.js',
        'js/adminlte.min.js',
        'js/angular/angular.min.js',
        'js/angular/angular-route.js',
        'js/angular/services.js',
        'js/angular/controllers.js',
        'js/angular/filters.js',
        'js/angular/directives.js',
        'js/dashboard.js',
        'js/site.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
?>