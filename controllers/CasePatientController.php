<?php

namespace app\controllers;

use Yii;
use app\models\CasePatient;
use app\models\CasePatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CasePatientController implements the CRUD actions for CasePatient model.
 */
class CasePatientController extends Controller
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
     * Lists all CasePatient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CasePatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CasePatient model.
     * @param integer $idcase
     * @param integer $casetype_idcasetype
     * @param integer $idservices
     * @param integer $iddoctor
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($idcase, $casetype_idcasetype, $idservices, $iddoctor, $p_pid, $p_sid, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcase, $casetype_idcasetype, $idservices, $iddoctor, $p_pid, $p_sid, $user_id),
        ]);
    }

    /**
     * Creates a new CasePatient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CasePatient();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcase' => $model->idcase, 'casetype_idcasetype' => $model->casetype_idcasetype, 'idservices' => $model->idservices, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CasePatient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idcase
     * @param integer $casetype_idcasetype
     * @param integer $idservices
     * @param integer $iddoctor
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($idcase, $casetype_idcasetype, $idservices, $iddoctor, $p_pid, $p_sid, $user_id)
    {
        $model = $this->findModel($idcase, $casetype_idcasetype, $idservices, $iddoctor, $p_pid, $p_sid, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcase' => $model->idcase, 'casetype_idcasetype' => $model->casetype_idcasetype, 'idservices' => $model->idservices, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CasePatient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idcase
     * @param integer $casetype_idcasetype
     * @param integer $idservices
     * @param integer $iddoctor
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($idcase, $casetype_idcasetype, $idservices, $iddoctor, $p_pid, $p_sid, $user_id)
    {
        $this->findModel($idcase, $casetype_idcasetype, $idservices, $iddoctor, $p_pid, $p_sid, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CasePatient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idcase
     * @param integer $casetype_idcasetype
     * @param integer $idservices
     * @param integer $iddoctor
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @return CasePatient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcase, $casetype_idcasetype, $idservices, $iddoctor, $p_pid, $p_sid, $user_id)
    {
        if (($model = CasePatient::findOne(['idcase' => $idcase, 'casetype_idcasetype' => $casetype_idcasetype, 'idservices' => $idservices, 'iddoctor' => $iddoctor, 'p_pid' => $p_pid, 'p_sid' => $p_sid, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
