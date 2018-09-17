<?php

namespace backend\models;

use Yii;
use common\models\User;
use yii\helpers\Html;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $fullName_en
 * @property string $fullName_ar
 * @property string $jobTitle
 * @property string $image
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $type
 * @property integer $status
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 */
class UsersManagement extends \yii\db\ActiveRecord
{
    public $change_password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullName_en', 'jobTitle_en','fullName_ar','jobTitle_ar', 'email','type','status'], 'required'],
            [['type','status', 'created_at', 'created_by', 'updated_at', 'updated_by','change_password'], 'integer'],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['fullName_en','fullName_ar','jobTitle_en','jobTitle_ar'], 'string', 'max' => 500],
            [['image'], 'string', 'max' => 355],
            [['auth_key'], 'string', 'max' => 32],
            
            [['password_reset_token'], 'unique'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'message' => Yii::t('yii','This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'message' => Yii::t('yii','This email address has already been taken.')],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => Yii::t('yii','Username'),
            'fullName_en' => Yii::t('yii','Name').' ('.Yii::t('yii','English').')',
            'jobTitle_en' => Yii::t('yii','Job Title').' ('.Yii::t('yii','English').')',
            'fullName_ar' => Yii::t('yii','Name').' ('.Yii::t('yii','Arabic').')',
            'jobTitle_ar' => Yii::t('yii','Job Title').' ('.Yii::t('yii','Arabic').')',
            'image' => Yii::t('yii','Image'),
            'auth_key' => 'Auth Key',
            'password_hash' => Yii::t('yii','Password'),
            'change_password' => Yii::t('yii','Change Password'),
            'password_reset_token' => 'Password Reset Token',
            'email' => Yii::t('yii','Email'),
            'status' => Yii::t('yii','Status'),
            'type' => Yii::t('yii','Type'),
            'lastLogin'=>Yii::t('yii','Last Login'),
            'lastLogout'=>Yii::t('yii','Last Logout'),
            'created_at' => Yii::t('yii','Created At'),
            'created_by' => Yii::t('yii','Created By'),
            'updated_at' => Yii::t('yii','Updated At'),
            'updated_by' => Yii::t('yii','Updated By'),
        ];
    }
}