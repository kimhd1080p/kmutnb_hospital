<?php

namespace app\controllers;

use Yii;
use app\models\Patient;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
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
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patient model.
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $status_id
     * @param integer $department_id
     * @param integer $studentclass_id
     * @return mixed
     */
    public function actionView($p_pid, $p_sid)
    {
        return $this->render('view', [
            'model' => $this->findModel($p_pid, $p_sid),
        ]);
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            
                     Yii::$app->getSession()->setFlash('create', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'บันทึกข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            return $this->redirect(['view', 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $status_id
     * @param integer $department_id
     * @param integer $studentclass_id
     * @return mixed
     */
    public function actionUpdate($p_pid, $p_sid)
    {
        $model = $this->findModel($p_pid, $p_sid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
             Yii::$app->getSession()->setFlash('update', [
     'type' => 'warning',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'แก้ไขข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            return $this->redirect(['view', 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $status_id
     * @param integer $department_id
     * @param integer $studentclass_id
     * @return mixed
     */
    public function actionDelete($p_pid, $p_sid)
    {
        $this->findModel($p_pid, $p_sid)->delete();
        
          Yii::$app->getSession()->setFlash('delete', [
     'type' => 'error',
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
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $status_id
     * @param integer $department_id
     * @param integer $studentclass_id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($p_pid, $p_sid)
    {
        if (($model = Patient::findOne(['p_pid' => $p_pid, 'p_sid' => $p_sid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
