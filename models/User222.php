<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;


class User extends ActiveRecord implements \yii\web\IdentityInterface
{
     
public $id;
public $username;
public $password;
public $authKey;
public $accessToken;



public static function tableName() { return 'user'; }


   /**
 * @inheritdoc
 */
public static function findIdentity($id) {
  

    return static::findOne($id); 
  
}

// public function getName()
// {
//     # code...
//     return $this->u_name;
// }

/**
 * @inheritdoc
 */
public static function findIdentityByAccessToken($token, $userType = null) {

    $user = self::find()
            ->where(["accessToken" => $token])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}

/**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
public static function findByUsername($username) {
    $user = self::findOne(["username" => $username]);
           
    if (!count($user)) {
        return null;
    }
    return new static($user);
}

/**
 * @inheritdoc
 */
public function getId() {
    return $this->getPrimaryKey();
}

/**
 * @inheritdoc
 */
public function getAuthKey() {
    return $this->auth_key;
}

/**
 * @inheritdoc
 */
public function validateAuthKey($authKey) {
    return $this->auth_key === $authKey;
}

/**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
public function validatePassword($password) {
    return $this->password_hash === $password;
}

}
