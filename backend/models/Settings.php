<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $titleEN
 * @property string $titleAR
 * @property string $modelName
 * @property string $modelTableName
 * @property integer $dataPerPageEN
 * @property integer $dataPerPageAR
 * @property integer $categories
 * @property integer $status
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titleEN', 'titleAR', 'modelName', 'modelTableName', 'dataPerPageEN', 'dataPerPageAR'], 'required'],
            [['dataPerPageEN', 'dataPerPageAR','categories','pageHeader','status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['titleEN', 'titleAR', 'modelName', 'modelTableName'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii','ID'),
            'titleEN' => Yii::t('yii','Title (English)'),
            'titleAR' => Yii::t('yii','Title (Arabic)'),
            'modelName' => Yii::t('yii','Model Name'),
            'modelTableName' => Yii::t('yii','Model Table Name'),
            'dataPerPageEN' => Yii::t('yii','Data per page').' ('.Yii::t('yii','English').')',
            'dataPerPageAR' => Yii::t('yii','Data per page').' ('.Yii::t('yii','Arabic').')',
            'categories'=> Yii::t('yii','Categories'),
            'pageHeader'=> Yii::t('yii','Page Header'),
            'created_at' => Yii::t('yii','Created At'),
            'created_by' => Yii::t('yii','Created By'),
            'updated_at' => Yii::t('yii','Updated At'),
            'updated_by' => Yii::t('yii','Updated By'),
        ];
    }
}
