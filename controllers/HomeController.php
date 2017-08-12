<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
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
                        'actions' => ['logout'],
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
     // $session = Yii::$app->session;
//$session->open();
  
  return $this->render('index');

        
    }
     

     
    
    
 

    

    

    
}
