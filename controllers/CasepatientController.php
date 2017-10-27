<?php

namespace app\controllers;

use Yii;
use app\models\Casepatient;
use app\models\CasepatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Patient;

/**
 * CasepatientController implements the CRUD actions for Casepatient model.
 */
class CasepatientController extends Controller
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
     * Lists all Casepatient models.
     * @return mixed
     */
protected function Patient(){
    $session = Yii::$app->session;
     $modelpat = new Patient();
       $patient1=$modelpat::findOne(["p_pid"=> $session['pid']]);
    return $patient1;
}
    public function actionIndex()
    {
        $searchModel = new CasepatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,'pid' => $this->Patient()->p_pid,
        ]);
    }

    /**
     * Displays a single Casepatient model.
     * @param integer $idcase
     * @param integer $idservices
     * @param integer $casetype_idcasetype
     * @param integer $iddoctor
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($idcase, $iddoctor, $p_pid, $p_sid, $nurse_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcase, $iddoctor, $p_pid, $p_sid, $nurse_id),
        ]);
    }

    /**
     * Creates a new Casepatient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Casepatient();

        if ($model->load(Yii::$app->request->post())) {
             $model->casetype_idcasetype = implode(",", $model->casetype_idcasetype);
$model->idservices = implode(",", $model->idservices);

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
            return $this->redirect(['index']);
            } } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Casepatient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idcase
     * @param integer $idservices
     * @param integer $casetype_idcasetype
     * @param integer $iddoctor
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($idcase, $iddoctor, $p_pid, $p_sid, $nurse_id)
    {
        $model = $this->findModel($idcase, $iddoctor, $p_pid, $p_sid, $nurse_id);
                $model->casetypeToArray();
                 $model->servicesToArray();
                
        if ($model->load(Yii::$app->request->post())) {
 $model->casetype_idcasetype = implode(",", $model->casetype_idcasetype);
$model->idservices = implode(",", $model->idservices);
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
} } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Casepatient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idcase
     * @param integer $idservices
     * @param integer $casetype_idcasetype
     * @param integer $iddoctor
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($idcase, $iddoctor, $p_pid, $p_sid, $nurse_id)
    {
        $this->findModel($idcase, $iddoctor, $p_pid, $p_sid, $nurse_id)->delete();
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
     * Finds the Casepatient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idcase
     * @param integer $idservices
     * @param integer $casetype_idcasetype
     * @param integer $iddoctor
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @return Casepatient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcase, $iddoctor, $p_pid, $p_sid, $nurse_id)
    {
        if (($model = Casepatient::findOne(['idcase' => $idcase,  'iddoctor' => $iddoctor, 'p_pid' => $p_pid, 'p_sid' => $p_sid, 'nurse_id' => $nurse_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
