<?php

namespace app\controllers;

use Yii;
use app\models\Accident;
use app\models\AccidentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccidentController implements the CRUD actions for Accident model.
 */
class AccidentController extends Controller
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
     * Lists all Accident models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccidentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Accident model.
     * @param integer $idaccident
     * @param integer $accidenttype_idaccidenttype
     * @param integer $medicaltreatment_idmedicaltreatment
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @param integer $inlocattype_idinlocattype
     * @return mixed
     */
    public function actionView($idaccident, $accidenttype_idaccidenttype, $medicaltreatment_idmedicaltreatment, $p_pid, $p_sid, $nurse_id, $inlocattype_idinlocattype)
    {
        return $this->render('view', [
            'model' => $this->findModel($idaccident, $accidenttype_idaccidenttype, $medicaltreatment_idmedicaltreatment, $p_pid, $p_sid, $nurse_id, $inlocattype_idinlocattype),
        ]);
    }

    /**
     * Creates a new Accident model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Accident();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idaccident' => $model->idaccident, 'accidenttype_idaccidenttype' => $model->accidenttype_idaccidenttype, 'medicaltreatment_idmedicaltreatment' => $model->medicaltreatment_idmedicaltreatment, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'nurse_id' => $model->nurse_id, 'inlocattype_idinlocattype' => $model->inlocattype_idinlocattype]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Accident model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idaccident
     * @param integer $accidenttype_idaccidenttype
     * @param integer $medicaltreatment_idmedicaltreatment
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @param integer $inlocattype_idinlocattype
     * @return mixed
     */
    public function actionUpdate($idaccident, $accidenttype_idaccidenttype, $medicaltreatment_idmedicaltreatment, $p_pid, $p_sid, $nurse_id, $inlocattype_idinlocattype)
    {
        $model = $this->findModel($idaccident, $accidenttype_idaccidenttype, $medicaltreatment_idmedicaltreatment, $p_pid, $p_sid, $nurse_id, $inlocattype_idinlocattype);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idaccident' => $model->idaccident, 'accidenttype_idaccidenttype' => $model->accidenttype_idaccidenttype, 'medicaltreatment_idmedicaltreatment' => $model->medicaltreatment_idmedicaltreatment, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'nurse_id' => $model->nurse_id, 'inlocattype_idinlocattype' => $model->inlocattype_idinlocattype]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Accident model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idaccident
     * @param integer $accidenttype_idaccidenttype
     * @param integer $medicaltreatment_idmedicaltreatment
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @param integer $inlocattype_idinlocattype
     * @return mixed
     */
    public function actionDelete($idaccident, $accidenttype_idaccidenttype, $medicaltreatment_idmedicaltreatment, $p_pid, $p_sid, $nurse_id, $inlocattype_idinlocattype)
    {
        $this->findModel($idaccident, $accidenttype_idaccidenttype, $medicaltreatment_idmedicaltreatment, $p_pid, $p_sid, $nurse_id, $inlocattype_idinlocattype)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Accident model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idaccident
     * @param integer $accidenttype_idaccidenttype
     * @param integer $medicaltreatment_idmedicaltreatment
     * @param string $p_pid
     * @param string $p_sid
     * @param integer $user_id
     * @param integer $inlocattype_idinlocattype
     * @return Accident the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idaccident, $accidenttype_idaccidenttype, $medicaltreatment_idmedicaltreatment, $p_pid, $p_sid, $nurse_id, $inlocattype_idinlocattype)
    {
        if (($model = Accident::findOne(['idaccident' => $idaccident, 'accidenttype_idaccidenttype' => $accidenttype_idaccidenttype, 'medicaltreatment_idmedicaltreatment' => $medicaltreatment_idmedicaltreatment, 'p_pid' => $p_pid, 'p_sid' => $p_sid, 'nurse_id' => $nurse_id, 'inlocattype_idinlocattype' => $inlocattype_idinlocattype])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
