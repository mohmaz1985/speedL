<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pageHeader".
 *
 * @property integer $id
 * @property string $title
 * @property integer $modelID
 * @property string $image
 * @property string $lang
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class PageHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pageHeader';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'modelID'], 'required'],
            [['id', 'modelID', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'modelID' => 'Model ID',
            'image' => 'Image',
            'lang' => 'Lang',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
