<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $categories
 * @property string $status
 * @property string $publish
 * @property integer $order_recorder
 * @property integer $old_order_recorder
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class Contact extends \yii\db\ActiveRecord
{
    public $old_order_recorder;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'categories'], 'required'],
            [['description'], 'string'],
            [['status','publish','order_recorder','old_order_recorder','created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title'], 'string', 'max' => 500],
            [['image', 'categories'], 'string', 'max' => 255],
            [['categories'], 'safe'],
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
            'description' => Yii::t('yii','Description'),
            'image' => Yii::t('yii','Image'),
            'publish' => Yii::t('yii','Publish'),
            'categories' => Yii::t('yii','Category'),
            'created_at' => Yii::t('yii','Created At'),
            'created_by' => Yii::t('yii','Created By'),
            'updated_at' => Yii::t('yii','Updated At'),
            'updated_by' => Yii::t('yii','Updated By'),
        ];
    }
    /**
    * @return \yii\db\ActiveQuery
    */
     public function getCategoriesName()
     {
         return $this->hasOne(Categories::className(), ['id' => 'categories']);
     }
}
