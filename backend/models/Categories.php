<?php

namespace backend\models;

use Yii;
use backend\models\Settings;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parentid
 * @property integer $modelID
 * @property string $showINList
 * @property string $numberOfUse
 * @property string $lang
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class Categories extends \yii\db\ActiveRecord
{
    public $addSubCategory;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'modelID'], 'required'],
            [['parentid', 'modelID','showINList','numberOfUse', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 2],
            [['addSubCategory'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('yii','Title'),
            'parentid' => Yii::t('yii','Main Category'),
            'modelID' => Yii::t('yii','Model'),
            'showINList'=>Yii::t('yii','Show in Categories List'),
            'lang' => 'Lang',
            'created_at' => Yii::t('yii','Created At'),
            'created_by' => Yii::t('yii','Created By'),
            'updated_at' => Yii::t('yii','Updated At'),
            'updated_by' => Yii::t('yii','Updated By'),
        ];
    }
    /**
    * @return \yii\db\ActiveQuery
    */
     public function getSetteingsModelName()
     {
         return $this->hasOne(Settings::className(), ['id' => 'modelID']);
     }
     /**
    * @return \yii\db\ActiveQuery
    */
     public function getCategoriesName()
     {
         return $this->hasOne(self::className(), ['id' => 'parentid']);
     }
}
