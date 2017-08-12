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

     
     public function actionHistory()
    {
   $model = new Patient();
            $model2 = new PatientSearch();
        return $this->render('history/patientsearch' ,['model' => $model,'dataProvider' =>$model2->search(Yii::$app->request->post())]);
    }
     public function actionSavehistory()
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
            return $this->render('history/savehistory', [
                'model' => $model,'modelpat' => $modelpat,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Yii::$app->user->loginUrl);
    }

}
