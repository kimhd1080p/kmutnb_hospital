<?php

namespace app\controllers;

use Yii;
use app\models\Appointment;
use app\models\AppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppointmentController implements the CRUD actions for Appointment model.
 */
class AppointmentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Appointment models.
     * @return mixed
     */
    public function actionIndex()
    {
                $sql1 = 'SELECT *  FROM appointment a ,doctor d  WHERE a.doctor_iddoctor=d.iddoctor and d.doctortype_id=2 and DATE(timestam)="'.date("Y-m-d").'"';
                $p1 = Appointment::findBySql($sql1)->count();
$sql2 = 'SELECT *  FROM appointment a ,doctor d  WHERE a.doctor_iddoctor=d.iddoctor and d.doctortype_id=3 and DATE(timestam)="'.date("Y-m-d").'"';
                $p2 = Appointment::findBySql($sql2)->count();
Yii::$app->getSession()->setFlash('alert', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'แพทย์ทั่วไป '.$p1.' คน จิตแพทย์ '.$p2.' คน',
     'title' => 'รายการนัดพบแพทย์วันนี้',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
        
        
        $searchModel = new AppointmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Appointment model.
     * @param integer $ID
     * @param integer $user_id
     * @param string $patient_p_pid
     * @param string $patient_p_sid
     * @param integer $casetype_idcasetype
     * @param integer $doctor_iddoctor
     * @return mixed
     */
    public function actionView($ID, $nurse_id, $patient_p_pid, $patient_p_sid,  $doctor_iddoctor)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $nurse_id, $patient_p_pid, $patient_p_sid, $doctor_iddoctor),
        ]);
    }

    /**
     * Creates a new Appointment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Appointment();

        if ($model->load(Yii::$app->request->post())) {
             $model->casetype_idcasetype = implode(",", $model->casetype_idcasetype);
            if($model->save()){
            
                
               
            Yii::$app->getSession()->setFlash('alert', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'บันทึกข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            Yii::$app->getSession()->setFlash('appointments', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => "ของคุณ".$model->patient->p_name." ".$model->patient->p_surname,
     'title' => 'มีรายการนัดใหม่',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            return $this->redirect(['index']);
            }} else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Appointment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $user_id
     * @param string $patient_p_pid
     * @param string $patient_p_sid
     * @param integer $casetype_idcasetype
     * @param integer $doctor_iddoctor
     * @return mixed
     */
    public function actionUpdate($ID, $nurse_id, $patient_p_pid, $patient_p_sid,  $doctor_iddoctor)
    {
        
        $model = $this->findModel($ID, $nurse_id, $patient_p_pid, $patient_p_sid,  $doctor_iddoctor);
$model->casetypeToArray();
         if ($model->load(Yii::$app->request->post())) {
             $model->casetype_idcasetype = implode(",", $model->casetype_idcasetype);
            if($model->save()){
            
             Yii::$app->getSession()->setFlash('alert', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'แก้ไขข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            
            
            return $this->redirect(['index']);
            }} else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Appointment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $user_id
     * @param string $patient_p_pid
     * @param string $patient_p_sid
     * @param integer $casetype_idcasetype
     * @param integer $doctor_iddoctor
     * @return mixed
     */
    public function actionDelete($ID, $nurse_id, $patient_p_pid, $patient_p_sid,  $doctor_iddoctor)
    {
        $this->findModel($ID, $nurse_id, $patient_p_pid, $patient_p_sid, $doctor_iddoctor)->delete();

        
        Yii::$app->getSession()->setFlash('alert', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'ลบข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Appointment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $user_id
     * @param string $patient_p_pid
     * @param string $patient_p_sid
     * @param integer $casetype_idcasetype
     * @param integer $doctor_iddoctor
     * @return Appointment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $nurse_id, $patient_p_pid, $patient_p_sid, $doctor_iddoctor)
    {
        if (($model = Appointment::findOne(['ID' => $ID, 'nurse_id' => $nurse_id, 'patient_p_pid' => $patient_p_pid, 'patient_p_sid' => $patient_p_sid,  'doctor_iddoctor' => $doctor_iddoctor])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
