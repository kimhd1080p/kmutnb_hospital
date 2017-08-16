<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Patient;
use app\models\PatientSearch;
use app\models\CasePatient;


class NurseserviceController extends \yii\web\Controller
{
   
  

     public function actionIndex()
    {
return $this->render('index');
    }
 
public function actionPsearch()
    {
    //$model = new Patient();
   $model = new PatientSearch();
return $this->render('psearch',['model' => $model,'dataProvider' =>$model->search(Yii::$app->request->post())]);
    }
    
      public function actionPservice($pid)
    {
        $modelpat = new Patient();
        $patient1=$modelpat::findOne(["p_pid"=>$pid]);
        $session = Yii::$app->session;
        $session['pid']=$patient1->p_pid;
        $session['sid']=$patient1->p_sid;
        $session['pname']=$patient1->p_name;
        $session['psurname']=$patient1->p_surname;
        return $this->render('pservice', [
   'model' => $modelpat,'pid' => $patient1->p_pid,'sid' => $patient1->p_sid,'name' => $patient1->p_name,'surname' => $patient1->p_surname,
            ]);

    }
      public function actionCasepatient($pid)
    {return $this->redirect( array('//casepatient/index'));}
    
    public function actionAppointment($pid)
    {return $this->redirect( array('//appointment/index'));}
    
    Public function actionCasemedicine($pid)
    {return $this->redirect( array('//casemedicine/index'));}
     
     public function actionHistory()
    {
   $model = new Patient();
   $model2 = new PatientSearch();
        return $this->render('history/patientsearch' ,['model' => $model,'dataProvider' =>$model2->search(Yii::$app->request->post())]);
    }
     public function actionSavehistory($pid)
    {
        $model = new CasePatient();
        $modelpat = new Patient();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          Yii::$app->getSession()->setFlash('alert',[
        'body'=>'ลงทะเบียนงานวิจัยเสร็จเรียบร้อย! เจ้าหน้าที่จะติดต่อกลับไปเร็วที่สุด..',
        'options'=>['class'=>'alert-success']
     ]);

return $this->redirect(['nurseservice/index']);
        } else {
             $modelpat = new Patient();
              $patient1=$modelpat::findOne(["p_pid"=>$pid]);
            return $this->render('history/savehistory', [
                'model' => $model,'pid' => $patient1->p_pid,'sid' => $patient1->p_sid,'name' => $patient1->p_name,'surname' => $patient1->p_surname,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Yii::$app->user->loginUrl);
    }

}
