<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'authentication'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'ชื่อผู้ใช้งาน'),
            'password' => Yii::t('app', 'รหัสผ่าน'),
            'rememberMe' => Yii::t('app', 'จำการเข้าระบบ'),
        ];
    }

    public function authentication($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = new UserIdentity($this->username, $this->password);
            if (!$user->authenticate()) {
                //$this->addError($attribute, 'Incorrect username or password' . ' ' . $user->errorMessage);
                $this->addError($attribute, $user->errorMessage);
            }
        }
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserIdentity::findByUsername($this->username);
        }

        return $this->_user;
    }
}
