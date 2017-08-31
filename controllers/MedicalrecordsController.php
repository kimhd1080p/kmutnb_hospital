<?php
namespace app\controllers;
use Yii;
use app\models\Appointment;
use app\models\AppointmentSearch2;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MedicalrecordsController extends \yii\web\Controller
{
   
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

     public function actionIndex()
    {

        return $this->render('index');
    }
    
    public function actionIndex2()
    {
 $searchModel = new AppointmentSearch2();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'model' => $this->findModel($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor),
        ]);
    }
    public function actionAppointments()
    {
        $searchModel = new AppointmentSearch2();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);
        return $this->render('appointments', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'model' => $this->findModel($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor),
        ]);
    }
     public function actionView($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
               
            Yii::$app->getSession()->setFlash('success', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'บันทึกข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            return $this->redirect(['view', 'ID' => $model->ID, 'user_id' => $model->user_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' => $model->doctor_iddoctor]);
        } else {
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
    public function actionUpdate($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor)
    {
        $model = $this->findModel($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
             Yii::$app->getSession()->setFlash('success', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'แก้ไขข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            
            
            return $this->redirect(['view', 'ID' => $model->ID, 'user_id' => $model->user_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' => $model->doctor_iddoctor]);
        } else {
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
    public function actionDelete($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor)
    {
        $this->findModel($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor)->delete();

        
        Yii::$app->getSession()->setFlash('success', [
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
    protected function findModel($ID, $user_id, $patient_p_pid, $patient_p_sid, $casetype_idcasetype, $doctor_iddoctor)
    {
        if (($model = Appointment::findOne(['ID' => $ID, 'user_id' => $user_id, 'patient_p_pid' => $patient_p_pid, 'patient_p_sid' => $patient_p_sid, 'casetype_idcasetype' => $casetype_idcasetype, 'doctor_iddoctor' => $doctor_iddoctor])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
