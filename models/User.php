<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $accessToken
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $u_name
 * @property string $u_surname
 *
 * @property Appointment[] $appointments
 * @property CasePatient[] $casePatients
 */



class User extends ActiveRecord implements \yii\web\IdentityInterface
{
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
            [['username', 'auth_key', 'accessToken', 'password_hash', 'email', 'created_at', 'updated_at', 'u_name', 'u_surname'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['accessToken', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 256],
            [['u_name', 'u_surname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'บัญชีผู้ใช้',
            'auth_key' => 'รหัสผ่าน',
            'accessToken' => 'Access Token',
            'password_hash' => 'ชื่อ',
            'password_reset_token' => 'นามสกุล',
            'email' => 'เบอร์โทร',
            'status' => 'accessToken',
            'created_at' => 'authKey',
            'updated_at' => 'Updated At',
            'u_name' => 'ชื่อ',
            'u_surname' => 'นามสกุล',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasePatients()
    {
        return $this->hasMany(CasePatient::className(), ['user_id' => 'id']);
    }

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
