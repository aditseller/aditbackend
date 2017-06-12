<?php

namespace app\models;

use app\models\Admins as TAdmins;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
   public  $id_admin;
public  $email;
public $password;
public  $fullname;
public  $phone;
public  $level;
public  $authKey;
public  $accessToken;


    /**
     * @inheritdoc
     */
    public static function findIdentity($id_admin)
    {
         $TableUsers = TAdmins::find()->where(["id_admin"=>$id_admin])->one();
        if(!count($TableUsers)) {
            return null;
        }
        return new static($TableUsers);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      $TableUsers = TAdmins::find()->where(["accessToken"=>$token])->one();
        if(!count($TableUsers)) {
            return null;
        }
        return new static($TableUsers);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($email)
    {
        $TableUsers = TAdmins::find()->where(["email"=>$email])->one();
        if(!count($TableUsers)) {
            return null;
        }
        return new static($TableUsers);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id_admin;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === bin2hex($password);
    }
}
