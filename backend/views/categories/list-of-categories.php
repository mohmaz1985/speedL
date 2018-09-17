<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\General;
/* @var $this yii\web\View */
/* @var $model backend\models\AboutUs */
/* @var $form yii\widgets\ActiveForm */

 $generalObj = new General();

$this->title = Yii::t('yii','List Of Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii','Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

	<div>
      <b><?=Yii::t('yii','List Of Categories')?><br/><br/></b>
      <?= $generalObj->showCategories(0)?>
	</div>

</div>
