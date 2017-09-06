<?php

namespace app\controllers;

use Yii;
use app\models\Medicine;
use app\models\MedicineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MedicineController implements the CRUD actions for Medicine model.
 */
class MedicineController extends Controller
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
     * Lists all Medicine models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedicineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Medicine model.
     * @param string $idmedicine
     * @param integer $idmedicinetype
     * @return mixed
     */
    public function actionView($idmedicine, $idmedicinetype)
    {
        return $this->render('view', [
            'model' => $this->findModel($idmedicine, $idmedicinetype),
        ]);
    }

    /**
     * Creates a new Medicine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Medicine();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idmedicine' => $model->idmedicine, 'idmedicinetype' => $model->idmedicinetype]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Medicine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idmedicine
     * @param integer $idmedicinetype
     * @return mixed
     */
    public function actionUpdate($idmedicine, $idmedicinetype)
    {
        $model = $this->findModel($idmedicine, $idmedicinetype);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idmedicine' => $model->idmedicine, 'idmedicinetype' => $model->idmedicinetype]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Medicine model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idmedicine
     * @param integer $idmedicinetype
     * @return mixed
     */
    public function actionDelete($idmedicine, $idmedicinetype)
    {
        $this->findModel($idmedicine, $idmedicinetype)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Medicine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idmedicine
     * @param integer $idmedicinetype
     * @return Medicine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idmedicine, $idmedicinetype)
    {
        if (($model = Medicine::findOne(['idmedicine' => $idmedicine, 'idmedicinetype' => $idmedicinetype])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
      
    
}
