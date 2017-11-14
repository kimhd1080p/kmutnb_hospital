<?php

namespace app\controllers;

use Yii;
use app\models\Casemedicine;
use app\models\CasemedicineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Medicine;
use yii\helpers\Json;
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
            Yii::$app->getSession()->setFlash('create', [
     'type' => 'success',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'บันทึกข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            //return $this->redirect(['printmedicine', 'ID' => $model->ID, 'idcase' => $model->idcase, 'idmedicine' => $model->idmedicine, 'medicinepackage_id' => $model->medicinepackage_id]);
            return $this->redirect(['index']);
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
           
            Yii::$app->getSession()->setFlash('update', [
     'type' => 'warning',
     'duration' => 5000,
     'icon' => 'fa fa-users',
     'message' => 'สำเร็จ',
     'title' => 'แก้ไขข้อมูล',
     'positonY' => 'top',
     'positonX' => 'right'
 ]);
            
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
    
    public function actionGetmedicine($medicine)
    {
       $m = Medicine::findOne($medicine);
       echo Json::encode($m);
    }
     
    public function actionPrintmedicine($ID, $idcase, $idmedicine, $medicinepackage_id)
    {
        $this->layout = false;
      return $this->renderAjax('printmedicine',[
            'model' => $this->findModel($ID, $idcase, $idmedicine, $medicinepackage_id)
        ]);
        //return $this->redirect('printmedicine');
    }
    //พิมพ์ซองยา
    public function actionPrintsonga()
    {
       
      $model = new Casemedicine();
      if ($model->load(Yii::$app->request->post())) {
            return $this->renderAjax('printsonga2', [
                'model' => $model,
            ]);
      }else{
       return $this->render('printsonga', [
                'model' => $model,
            ]);
    }
    }
    
    
    
}
