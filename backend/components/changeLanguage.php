<?php
namespace backend\components;

class changeLanguage extends \yii\base\Behavior
{
	public function events()
	{
		return [
			\yii\web\Application::EVENT_BEFORE_REQUEST => 'changeLanguage',
		];
	}

	public function changeLanguage(){
		if(\yii::$app->getRequest()->getCookies()->has('lang')){
			\Yii::$app->language = \Yii::$app->getRequest()->getCookies()->getValue('lang');
		}else{
			\Yii::$app->language='en';
		}
	}
}
?>