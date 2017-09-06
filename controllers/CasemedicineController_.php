<?php

namespace app\controllers;

use Yii;
use app\models\Casemedicine;
use app\models\CasemedicineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Casepatient;
/**
 * CasemedicineController implements the CRUD actions for Casemedicine model.
 */
class CasemedicineController extends Controller
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
     * Lists all Casemedicine models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CasemedicineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Casemedicine model.
     * @param integer $ID
     * @param integer $idcase
     * @param string $idmedicine
     * @param integer $medicinepackage_id
     * @return mixed
     */
    public function actionView($ID, $idcase, $idmedicine, $medicinepackage_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $idcase, $idmedicine, $medicinepackage_id),
        ]);
    }

    /**
     * Creates a new Casemedicine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Casemedicine();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $dispense = Casepatient::findOne($model->idcase); //อัพเดปสถานะการจ่ายยา
            $dispense->dispense = 1;
            $dispense->update();
            return $this->redirect(['print', 'eat1' => '1', 'eat2' => '2',]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Casemedicine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $idcase
     * @param string $idmedicine
     * @param integer $medicinepackage_id
     * @return mixed
     */
    public function actionUpdate($ID, $idcase, $idmedicine, $medicinepackage_id)
    {
        $model = $this->findModel($ID, $idcase, $idmedicine, $medicinepackage_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'idcase' => $model->idcase, 'idmedicine' => $model->idmedicine, 'medicinepackage_id' => $model->medicinepackage_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Casemedicine model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $idcase
     * @param string $idmedicine
     * @param integer $medicinepackage_id
     * @return mixed
     */
    public function actionDelete($ID, $idcase, $idmedicine, $medicinepackage_id)
    {
        $this->findModel($ID, $idcase, $idmedicine, $medicinepackage_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Casemedicine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $idcase
     * @param string $idmedicine
     * @param integer $medicinepackage_id
     * @return Casemedicine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $idcase, $idmedicine, $medicinepackage_id)
    {
        if (($model = Casemedicine::findOne(['ID' => $ID, 'idcase' => $idcase, 'idmedicine' => $idmedicine, 'medicinepackage_id' => $medicinepackage_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionPrint($eat1, $eat2)
    {
        

        return $this->render('print',['eat1'=>$eat1,'eat2'=>$eat2]);
    }
}
