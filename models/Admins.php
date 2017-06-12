<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property integer $id_admin
 * @property string $email
 * @property string $password
 * @property string $fullname
 * @property string $phone
 * @property string $level
 * @property string $authKey
 * @property string $accessToken
 */
class Admins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'fullname', 'phone', 'level'], 'required'],
            [['level'], 'string'],
            [['email', 'fullname'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 300],
            [['phone'], 'string', 'max' => 20],
            [['authKey', 'accessToken'], 'string', 'max' => 500],
            [['email'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_admin' => 'Id Admin',
            'email' => 'Email',
            'password' => 'Password',
            'fullname' => 'Fullname',
            'phone' => 'Phone',
            'level' => 'Level',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    public function beforeSave($insert) {

        if(isset($this->password)) {

            
            $this->password = bin2hex($this->password);
            $this->authKey = sha1($this->email);


        }


            return parent::beforeSave($insert);


    }
}
