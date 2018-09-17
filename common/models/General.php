<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use backend\models\Settings;
use backend\models\SiteInformation;
use backend\models\Categories;
use backend\models\About;
use backend\models\Services;
use backend\models\PageHeader;
use yii\data\Pagination;
use yii\helpers\Html;
use common\models\General;
use common\models\EncrptionDecription;

class General extends ActiveRecord{

	// Show Time
    public function showTime($time){
        if($time!=0)
            return date('m/d/Y h:i:s a', $time);
        else
            return '-';
    }
    // Show Time
    public function showLogoutTime($time,$forceLogout,$lastLogin){
        if($time!=0){
            if($time <= $lastLogin)
            {
                return '<span class="text-success"> online </span>';
            }else{
                
                if($forceLogout==1){
                return date('m/d/Y h:i:s a', $time).'<span class="text-danger"> / <i>'.Yii::t('yii','Force Logout').'</i></span>';

                }else{
                    return date('m/d/Y h:i:s a', $time);
                }
            }
            
        }
        else
            return '-';
    }
	// show Type
    public function showType($type){
        switch ($type) {
            case '201':
                return Yii::t('yii','Admin');
                break;
            case '202':
                return Yii::t('yii','User');
                break;   
            default:
                return '-';
                break;
        }
    }
	// show Status
	public function showStatus($status){
        switch ($status) {
            case '101':
                return Yii::t('yii','Active');
                break;
            case '102':
                return Yii::t('yii','Block');
                break;
            case '103':
                return Yii::t('yii','Deleted');
                break;   
            default:
                return '-';
                break;
        }
    }
    // show Publish
    public function showPublish($status){
        switch ($status) {
            case '1':
                return Yii::t('yii','Yes');
                break;
            case '2':
                return Yii::t('yii','No');
                break;   
            default:
                return '-';
                break;
        }
    }
    // show Publish
    public function showYesOrNo($value){
        switch ($value) {
            case '1':
                return Yii::t('yii','Yes');
                break;
            case '0':
                return Yii::t('yii','No');
                break;   
            default:
                return '-';
                break;
        }
    }

    // Save File
    public function saveFile($folderName,$model,$title,$filed='image'){
    	
    	// Create Folder
	    if(!file_exists('uploadFile/'.$folderName)){
	        mkdir('uploadFile/'.$folderName,0777);
	    }

        // Image name
        $dateExtension=explode(' ', date('Y-m-d h:m:s'));
        $imageName = preg_replace("^[\\\\/:\*\?\"<>\|]^ ",'_', $title).'_'.str_replace('-', '_', $dateExtension[0]).'_'.str_replace(':', '_', $dateExtension[1]);

        //get Instance upload file
        $fileSave = UploadedFile::getInstance($model,$filed);

	    if($fileSave!=''){
	        // Copy file
	        $fileSave->saveAs('uploadFile/'.$folderName.'/'.$imageName.'.'.$fileSave->extension);
	        //Value Save in DB
	        $fileSave = 'uploadFile/'.$folderName.'/'.$imageName.'.'.$fileSave->extension;

	      }else{
	        $fileSave = '';
	    }
	    return $fileSave;
    }
    // Update File
    public function updateFile($folderName,$model,$oldImage,$title,$filed='image'){
    	

          // Update Image
          $dateExtension=explode(' ', date('Y-m-d h:m:s'));
          $imageName = preg_replace("^[\\\\/:\*\?\"<>\|]^ ",'_', $title).'_'.str_replace('-', '_', $dateExtension[0]).'_'.str_replace(':', '_', $dateExtension[1]);

          // get Instance upload file
          $updateImage = UploadedFile::getInstance($model,$filed);
          if($updateImage!='')
          {
            if($oldImage!='' && file_exists($oldImage))
              unlink($oldImage);

            $updateImage->saveAs('uploadFile/'.$folderName.'/'.$imageName.'.'.$updateImage->extension);
            // Value Save in DB
            $updateImage = 'uploadFile/'.$folderName.'/'.$imageName.'.'.$updateImage->extension;
          }
          else {
            $updateImage=$oldImage;
          }
          return $updateImage;
    }
    // Show User created/Updated Name
    public function showUserCU($idUser){
    	if($idUser!=""){
    		$userCount = User::find()
                        ->where(['id' => $idUser])
                        ->count();
	        $userResult = User::find()
	                        ->where(['id' => $idUser])
	                        ->all();
	        foreach($userResult as $result ){
                   $fullName = 'fullName_'.Yii::$app->language;
                   
                   return $result->$fullName;
	           }
        }else{
        	return '-';
    	}	
    }
    // Show Job Title
    public function showUserJobTitle($idUser){
        if($idUser!=""){
            $userCount = User::find()
                        ->where(['id' => $idUser])
                        ->count();
            $userResult = User::find()
                            ->where(['id' => $idUser])
                            ->all();
            foreach($userResult as $result ){
                   $jobTitle = 'jobTitle_'.Yii::$app->language;
                   
                   return $result->$jobTitle;
               }
        }else{
            return '-';
        }   
    }
    // Get Settings model object
    public function getSettingsModelObj($modelIDValue){
    	$modelValue = Settings::find()
                        ->where(['id' => $modelIDValue])
                        ->one();
        return $modelValue;
    }
    // Get Data Per Page Value
    public function getDataPerPage($modelIDValue){
    	$dataPerPage = Settings::find()
                        ->where(['id' => $modelIDValue])
                        ->one();

        return $dataPerPage['dataPerPage'.strtoupper(Yii::$app->language)];
    }
    // Get Model Name
    public function getModelName($modelIDValue){
        $titleValue = Settings::find()
                        ->where(['id' => $modelIDValue])
                        ->one();

        return $titleValue['title'.strtoupper(Yii::$app->language)];
    }
    // Function Management
    public function modelManagement($modelID){
        $modelName = $this->getSettingsModelObj($modelID);

        $modelPath = "\backend\models\\" . $modelName->modelName;
        
        $dataPerPage = $this->getDataPerPage($modelID);
        
        // pagination Management Page mohamamd Alsayyed 00962789670033
        $query= $modelPath::find()->where(['lang'=>Yii::$app->language])->orderBy(['order_recorder'=>SORT_DESC]);

        $countQuery = clone $query;
        
        $pagination = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>$dataPerPage]);

        $modelValueQuery=$query->offset($pagination->offset)
                          ->limit($pagination->limit)
                          ->all();

        return array($modelValueQuery, $pagination);
    }
    // Function show Categories / Mohammad Alsayyed 00962789670033
    public function showCategories($parent_id){

        $categories = Categories::find()->where(['parentid'=>$parent_id,'lang'=>Yii::$app->language])->all();
        $colorArra=array(" ","success","info","warning","danger");
        $colorLoop=0;
        $html = "";
        $html .= "<ul class='list-group'>";

        foreach ($categories as $key => $category) {
            $html .= "<li class='list-group-item list-group-item-success'>";
            
            $childCount = Categories::find()->where(['parentid'=>$category->id])->count();
            $html .= $category->id.' / '.$category->title.' / '.$childCount;
            if($childCount>0)
            $html .= self::showCategories($category->id);
            $html .= "</li>";

            $colorLoop++;
            if($colorLoop>3)
                $colorLoop=0;

        }
        $html .= "</ul>";
        return $html;
    }
    // Show Categories Select List By Mohammad Alsayyed 00962789670033
    public function showCategoriesSelectList($modelID){

        $categories = Categories::find()->where(['modelID'=>$modelID,'lang'=>Yii::$app->language,'showINList'=>1])->asArray()->all();
        return $categories;
    }
    // Show Categories Select List By Mohammad Alsayyed 00962789670033
    public function getCategoriesName($parentID){
        
        $categories = Categories::find()->where(['id'=>$parentID])->one();
        if($parentID!=0)
            return $categories->title;
        else
            return '-';

    }
    // Categories Update Number Of Use
    public function categoriesUpdateNumberOfUse($cat,$oldCat){
        
        $catModel = Categories::findOne($cat);
        if(empty($oldCat)){

            $catModel->numberOfUse=$catModel->numberOfUse+1;
            $catModel->save();
        }else if($cat!=$oldCat && !empty($oldCat) && $oldCat!='delete'){

            
            // Old Cat
            $oldCatModel = Categories::findOne($oldCat);
            $oldCatModel->numberOfUse=$oldCatModel->numberOfUse-1;
            $oldCatModel->save();

            // New Cat 
            $catModel->numberOfUse=$catModel->numberOfUse+1;
            $catModel->save();
        }else if($oldCat=='delete'){
            $catModel->numberOfUse=$catModel->numberOfUse-1;
            $catModel->save();
        }
    }
    // Site Information
    public function siteInformationData($infoType){
        $siteInformationModel = siteInformation::find()->where(['lang'=>Yii::$app->language])->one();
        switch ($infoType) {
            case 'title':
                    return $siteInformationModel->title;
                break;
            case 'footerInfo':
                    return $siteInformationModel->footerInfo;
                break;
            case 'metaTag':
                    return $siteInformationModel->metaTag;
                break;
            case 'youtube':
                    return $siteInformationModel->youtube;
                break;
            case 'twitter':
                    return $siteInformationModel->twitter;
                break;
            case 'facebook':
                    return $siteInformationModel->facebook;
                break;
            case 'linkedin':
                    return $siteInformationModel->linkedin;
                break;
            case 'adminEmail':
                    return $siteInformationModel->adminEmail;
                break;
            default:
                    return '';
                break;
        }
    }
    // Left Menu Open
    public function leftMenuOpen($activeModel){

        if(isset($_GET['r']))
        {
             $rValue=explode('/',$_GET['r']);
             $className='active'.$rValue[0];
            
            if($activeModel==$rValue[0])
                $className=' active ';
            
            else{
                $className='  ';
                $className='  ';
            }
            return $className;         
        }else if(empty($activeModel)){
            $className=' active ';
            return $className;
        }  
    }
    // function sub main menu
    public function subMainMenu($parentId,$link){
        $subMenu=[];
        $categories = Categories::find()->where(['parentid'=>$parentId,'lang'=>'en'])->all();
        

        foreach ($categories as $k=> $category) {
            $subMenu []= [
                    'label' => $category->title,
                    'url' => ['site/'.$link],
                    'items' => static::subMainMenu($category->id,$link),
                    '<li class="divider"></li>',
                
                ];
        }
        return ($subMenu);

    }
    // Visitor Number
    function visitorNumber($action){
        
        $query = new \yii\db\Query;
        $query->select('counter')->from('visitorNumber');
        $counter = $query->all();

        if($action=='view')
        {
            return $counter[0]['counter'];

        }else if($action=='update'){
            $addCount = $counter[0]['counter']+1;
            
            $update = Yii::$app->db->createCommand()->update('visitorNumber', ['counter' => $addCount],'')->execute();
        }
    }
     // function sub main menu about
    public function subMainMenuAbout(){
        $subMenu=[];
        $about = About::find()->where(['status'=>'1','publish'=>'1','lang'=>'en'])->all();
        
        // Create security Parameter Obj
        $securityParameter = new EncrptionDecription();

        foreach ($about as $k=> $result) {
            $idValue = $securityParameter->doEncrypt(utf8_decode($result->id));
            $subMenu []= [
                    'label' => $result->title,
                    'url' => ['/site/about','id'=>$idValue],      
                ];
        }
        return ($subMenu);
    }
     // function sub main menu about
    public function subMainMenuServices($parentId){
        $subMenu=[];
        $categories = Categories::find()->where(['parentid'=>$parentId,'lang'=>'en'])->all();
        
        // Create security Parameter Obj
        $securityParameter = new EncrptionDecription();
        
        foreach ($categories as $k=> $result) {
            $idValue = $securityParameter->doEncrypt(utf8_decode($result->id));
            $subItems=$this->showServicesData($result->id);
            $subMenu []= [
                    'label' => $result->title,
                    'itemsOptions'=>['class'=>'dropdown-submenu'],
                    'submenuOptions'=>['class'=>'dropdown-menu'],
                    'items'=>$subItems,
                ];
        }
        return ($subMenu);
    }
    //show Services Data
    public function showServicesData($cat){

        $subMenu=[];
        $services = Services::find()->where(['categories'=>$cat,'status'=>'1','showInSubMenu'=>1,'publish'=>'1','lang'=>'en'])->all();
        
        // Create security Parameter Obj
        $securityParameter = new EncrptionDecription();

        foreach ($services as $k=> $result) {
            $idValue = $securityParameter->doEncrypt(utf8_decode($result->id));
            $subMenu []= [
                    'label' => $result->title,
                    'url' => ['/site/services','id'=>$idValue],  
                ];
        }
        return ($subMenu);
    }
    // get page header
    function getPageHeaderImage($model){
        
        $settingsID = Settings::find()->where(['modelTableName'=>$model,'pageHeader'=>1])->one();
        if(!empty($settingsID->id)){
            
            $pageHeaderInfo = PageHeader::find()->where(['modelID'=>$settingsID->id])->one();
            ?>
                <?=Html::img('../../backend/web/'.$pageHeaderInfo->image,['class'=>'img-responsive imageHeader imgFull'])?>
                <div class="image-caption">
                          <h2><?=$pageHeaderInfo->title;?></h2>
                </div>
            <?php

        }else{
            echo ' ';
        }
    }
}

?>