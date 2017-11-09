<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\PasswordForm;
use app\models\User;
class HomeController extends Controller 
{


   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    
                    [
                        'actions' => ['logout','changepassword'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    

   public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
             return $this->redirect(['login']);
        }

        $model = new LoginForm();
       // $user = new User();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            //$session['userid']= $model->getUser()->st_id;
              // $session['name']= $model->getUser()->st_name;
                //  $session['surname']= $model->getUser()->st_sername;
               return $this->redirect(['index']);
          //  return $this->goBack();

        } else {
            
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    } 


 public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Yii::$app->user->loginUrl);
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id=='login')
                 $this->layout = 'login';
            return true;
        } else {
            return false;
        }
    }

    

    

    public function actionIndex()
    {
        $sql1="SELECT 
            count(case when `status_id` = 1 then 1 else null end) as 'นักศึกษา'
            ,count(case when `status_id` = 2 then 1 else null end) as 'อาจารย์'
            ,count(case when `status_id` = 3 then 1 else null end) as 'เจ้าหน้าที่'
            ,count(case when `status_id` = 4 then 1 else null end) as 'อื่นๆ'
          
            
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid and p.p_sid=c.p_sid 
and  MONTH(timestam) = '".date("m")."' AND YEAR(timestam) = '".date("Y")."'";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
     // $session = Yii::$app->session;
//$session->open();
  
  return $this->render('index',['dataProvider1'=>$dataProvider1]);

        
    }
    
     public function actionChangepassword(){
        $model = new PasswordForm;
        $modeluser = User::find()->where([
            'username'=>Yii::$app->user->identity->username
        ])->one();
      
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{
                    $modeluser->password_hash = $_POST['PasswordForm']['newpass'];
                    $modeluser->password_hash=Yii::$app->security->generatePasswordHash($modeluser->password_hash);
                    if($modeluser->save()){
                      Yii::$app->getSession()->setFlash('alert', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'เปลี่ยนรหัสผ่านเรียบร้อย',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
                        return $this->redirect(['index']);
                    }else{
                       
                          Yii::$app->getSession()->setFlash('alert', [
     'type' => 'error',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'เปลี่ยนรหัสผ่านผิดพลาด',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
                        return $this->redirect(['index']);
                    }
                }catch(Exception $e){
                   Yii::$app->getSession()->setFlash('alert', [
     'type' => 'error',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'เปลี่ยนรหัสผ่านผิดพลาด '.$e,
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }
     

     public function actionReport1()
    {
                      
    }
    
    
 

    

    

    
}
