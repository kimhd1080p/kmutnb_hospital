<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Patient;
use app\models\PatientSearch;
use app\models\PatientSearch2;



class NurseserviceController extends \yii\web\Controller
{
   
  

     public function actionIndex()
    {
return $this->render('index');
    }
 
public function actionPsearch()
    {
     $model = new PatientSearch2();
if(Yii::$app->request->get()){
   
   
   $dataProvider = $model->search1(Yii::$app->request->queryParams);
return $this->render('psearch',['model' => $model,'dataProvider' =>$dataProvider,'searchModel' => $model]);
    
}else{
    return $this->render('psearch',['model' => $model,'dataProvider' =>null]);
}
    //$model = new Patient();
   
    }
    
      public function actionPservice($pid,$sid)
    {
        $modelpat = new Patient();
        $patient1=$modelpat::findOne(["p_pid"=>$pid,"p_sid"=>$sid]);
        $session = Yii::$app->session;
        $session['pid']=$patient1->p_pid;
        $session['sid']=$patient1->p_sid;
        $session['pname']=$patient1->p_name;
        $session['psurname']=$patient1->p_surname;
        return $this->render('pservice', [
   'model' => $modelpat,'pid' => $patient1->p_pid,'sid' => $patient1->p_sid,'name' => $patient1->p_name,'surname' => $patient1->p_surname,
            ]);

    }
      public function actionCasepatient()
    {return $this->redirect( array('//casepatient/index'));}
    
    public function actionAppointment()
    {return $this->redirect( array('//appointment/index'));}
    
    Public function actionCasemedicine()
    {return $this->redirect( array('//casemedicine/index'));}
      Public function actionAccident()
    {return $this->redirect( array('//accident/index'));}
    
     public function actionHistory()
    {
   $model = new Patient();
   $model2 = new PatientSearch();
        return $this->render('history/patientsearch' ,['model' => $model,'dataProvider' =>$model2->search(Yii::$app->request->post())]);
    }
    

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Yii::$app->user->loginUrl);
    }

}
