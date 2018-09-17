<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $description
 * @property string $image
 * @property string $status
 * @property string $publish
 * @property integer $order_recorder
 * @property integer $old_order_recorder
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class Partners extends \yii\db\ActiveRecord
{
    public $old_order_recorder;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'required'],
            [['status','publish','order_recorder','old_order_recorder','created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 500],
            [['image','image_hover','link'], 'string', 'max' => 255],
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
            'link' => Yii::t('yii','Link'),
            'description' => Yii::t('yii','Description'),
            'image' => Yii::t('yii','Image'),
            'image_hover' => Yii::t('yii','Image Hover'),
            'publish' => Yii::t('yii','Publish'),
            'created_at' => Yii::t('yii','Created At'),
            'created_by' => Yii::t('yii','Created By'),
            'updated_at' => Yii::t('yii','Updated At'),
            'updated_by' => Yii::t('yii','Updated By'),
        ];
    }
}
