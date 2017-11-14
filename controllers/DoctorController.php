<?php

namespace app\controllers;

use Yii;
use app\models\Doctor;
use app\models\DoctorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctorController implements the CRUD actions for Doctor model.
 */
class DoctorController extends Controller
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
     * Lists all Doctor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoctorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doctor model.
     * @param integer $iddoctor
     * @param integer $doctortype_id
     * @return mixed
     */
    public function actionView($iddoctor, $doctortype_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddoctor, $doctortype_id),
        ]);
    }

    /**
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();

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
             
            return $this->redirect(['view', 'iddoctor' => $model->iddoctor, 'doctortype_id' => $model->doctortype_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Doctor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddoctor
     * @param integer $doctortype_id
     * @return mixed
     */
    public function actionUpdate($iddoctor, $doctortype_id)
    {
        $model = $this->findModel($iddoctor, $doctortype_id);

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
            return $this->redirect(['view', 'iddoctor' => $model->iddoctor, 'doctortype_id' => $model->doctortype_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Doctor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddoctor
     * @param integer $doctortype_id
     * @return mixed
     */
    public function actionDelete($iddoctor, $doctortype_id)
    {
        
        $this->findModel($iddoctor, $doctortype_id)->delete();
        
        
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
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $iddoctor
     * @param integer $doctortype_id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddoctor, $doctortype_id)
    {
        if (($model = Doctor::findOne(['iddoctor' => $iddoctor, 'doctortype_id' => $doctortype_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
