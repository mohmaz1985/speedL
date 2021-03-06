<?php
namespace backend\controllers;         
use Yii;       
use yii\web\Controller;         
use zxbodya\yii2\elfinder\ConnectorAction; 
      
class ElFinderController extends Controller         
{         
    public function actions()         
    {    
            
        return [         
            'connector' => array(         
                'class' => ConnectorAction::className(),         
                'settings' => array(         
                    'root' => Yii::getAlias('@webroot') . '/uploads/',                    
                    'URL' => Yii::getAlias('@web') . '/uploads/',         
                    'rootAlias' => 'Home',         
                    'mimeDetect' => 'none'         
                )                    
            ),         
        ];                    
    }         
}
?>