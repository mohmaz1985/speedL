<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "siteInformation".
 *
 * @property integer $id
 * @property string $title
 * @property string $adminEmail
 * @property string $footerInfo
 * @property string $metaTag
 * @property string $youtube
 * @property string $twitter
 * @property string $facebook
 * @property string $linkedin
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class SiteInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siteInformation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'footerInfo', 'metaTag'], 'required'],
            [['footerInfo', 'metaTag'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'adminEmail','youtube','twitter','facebook','linkedin'], 'string', 'max' => 255],
            ['adminEmail', 'trim'],
            ['adminEmail', 'required'],
            ['adminEmail', 'email'],
            ['adminEmail', 'string', 'max' => 255],
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
            'adminEmail' => Yii::t('yii','Admin Email'),
            'footerInfo' => Yii::t('yii','Footer Information'),
            'metaTag' => Yii::t('yii','Meta Tag'),
            'youtube'=>Yii::t('yii','Youtube').' ('.Yii::t('yii','link').')',
            'twitter'=>Yii::t('yii','Twitter').' ('.Yii::t('yii','link').')',
            'facebook'=>Yii::t('yii','Facebook').' ('.Yii::t('yii','link').')',
            'linkedin'=>Yii::t('yii','LinkedIn').' ('.Yii::t('yii','link').')',
            'created_at' => Yii::t('yii','Created At'),
            'created_by' => Yii::t('yii','Created By'),
            'updated_at' => Yii::t('yii','Updated At'),
            'updated_by' => Yii::t('yii','Updated By'),
        ];
    }
}
