<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use app\models\User;
use yii\db\Expression;

class UserIdentity extends \app\models\User implements IdentityInterface
{   

    const ERROR_NONE = 0;
    const ERROR_API_FAIL = 1;
    const ERROR_INVALID_CREDENTIALS = 2;
    const ERROR_INTERNAL = 3;
    const ERROR_CREATE_USER = 4;  
    const ERROR_UPDATE_USER = 5;        

    // public $_id;
    // public $name;
    public $username;
    public $password;
    // public $authKey;

    public $errorCode;
    public $errorMessage;

    public function __construct($username = null,$password = null)
    {
       $this->username = $username;
       $this->password = $password;
    }

    public function authenticate()
    {
        $this->errorCode = self::ERROR_NONE;

        $access_token = '7eo9R24SW-ThWcutKBr7Si6PcFtsMrj6'; // <----- API - Access Token Here
        //$scopes 	= "personel,student,exchange_student"; 	// <----- Scopes for search account type
       $scopes 	= "personel"; 	// <----- Scopes for search account type

        $username 	= $this->username; // <----- Username for authen
        $password 	= $this->password; 	// <----- Password for authen

        $api_url = 'https://api.account.kmutnb.ac.th/api/account-api/user-authen'; // <----- API URL

        $ch = curl_init();// Initiate connection
        curl_setopt($ch, CURLOPT_URL, $api_url); // set url
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // 10s timeout time for cURL connection
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // allow https verification if true
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Verify the certificate's name against host 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// Set so curl_exec returns the result instead of outputting it.
        curl_setopt($ch, CURLOPT_POST, true);// Set post method
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // automatically follow Location: headers (ie redirects)
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('scopes' => $scopes, 'username' => $username, 'password' => $password));
        
        if(($response = curl_exec($ch)) === false){
            $this->errorCode = self::ERROR_API_FAIL;
            $this->errorMessage = 'Curl error: ' . curl_errno($ch) . ' - ' . curl_error($ch);
        }else{
            $json_data = json_decode($response, true);
            if(!isset($json_data['api_status'])){
                $this->errorCode = self::ERROR_INTERNAL;
                $this->errorMessage = 'API Error ' . print_r($response, true);
            }elseif(@$json_data['api_status'] == 'success'){              
                $id = $json_data['userInfo']['pid'];

               if(($model = User::findOne($id)) === null){
                    $model = new User();
                    $model->id = $json_data['userInfo']['pid'];
                    $model->username = $json_data['userInfo']['username'];
                    $model->u_name = $json_data['userInfo']['displayname'];
                    $model->email = $json_data['userInfo']['email'];
                     $model->type = 0;
                    //$model->registration_ip = UserIdentity::getClientIP();
                    $model->password_hash = '';
                    $model->auth_key = \Yii::$app->security->generateRandomString();
                    // $model->created_at = new Expression('NOW()');
                    // $model->updated_at = new Expression('NOW()');
                    // $model->flags = 0;
                    if($model->save(false)){
                        // $model->assignDefaultRole();
                    }else{
                        $this->errorCode = self::ERROR_CREATE_USER;
                        $this->errorMessage = 'Create fail';
                        // var_dump($model->getErrors());                        
                    }                  
               }else{
                    $model->u_name = $json_data['userInfo']['displayname'];
                    if(empty($model->u_name) && !empty($json_data['userInfo']['email'])){
                        $model->email = $json_data['userInfo']['email'];
                    }
                    //$model->email = $json_data['userInfo']['email'];
                    
                    if(!$model->save(false)){
                        $this->errorCode = self::ERROR_UPDATE_USER;
                        $this->errorMessage = 'Create fail';
                        //var_dump($model->getErrors());
                    }                      
               }

            }elseif(@$json_data['api_status'] == 'fail'){
                $this->errorCode = self::ERROR_INVALID_CREDENTIALS;
                //$this->errorMessage = 'Invalid Credentials';
                $this->errorMessage = $json_data['api_message'];
            }else{
                $this->errorCode = self::ERROR_INTERNAL;
                $this->errorMessage = 'Unable to Authenticate';
            }
        }
        curl_close($ch);
        
        return !$this->errorCode;

    } /* !--authenticate() */

	public static function findIdentity($id){
         return static::findOne($id);
//        return static::find()
//                ->andWhere(['=', 'username' , $id])
//                //->andWhere('blocked_at = 0 OR blocked_at IS NULL')
//                ->one();
	}    

    public function getFullName()
    {
        return $this->u_name . ' ' .$this->email;
    }    
 
	public static function findIdentityByAccessToken($token, $type = null){
		throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
	}
 
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomKey();
    }    
 
	public function getAuthKey(){
        // throw new NotSupportedException();//You should not implement this method if you don't have authKey column in your database
		return $this->auth_key;//Here I return a value of my authKey column
	}
 
	public function validateAuthKey($authKey){
        // throw new NotSupportedException();//You should not implement this method if you don't have authKey column in your database
		return $this->auth_key === $authKey;
	}
    
	public static function findByUsername($username){
		return self::findOne(['username'=>$username]);
	}
 
	// public function validatePassword($password){
	// 	return $this->password === $password;
	// }

    public static function getClientIP(){
        if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
            return $_SERVER["HTTP_CLIENT_IP"]; 
        }elseif (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
            return  $_SERVER["HTTP_X_FORWARDED_FOR"];  
        }elseif (array_key_exists('REMOTE_ADDR', $_SERVER)) { 
            return $_SERVER["REMOTE_ADDR"]; 
        }
        return '';
    }
}
