<?php

namespace app\controllers;

use Yii;
use app\models\Nurse;
use app\models\NurseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NurseController implements the CRUD actions for Nurse model.
 */
class NurseController extends Controller
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
     * Lists all Nurse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NurseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nurse model.
     * @param integer $id
     * @param integer $usertype_ut_id
     * @return mixed
     */
    public function actionView($id, $usertype_ut_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $usertype_ut_id),
        ]);
    }

    /**
     * Creates a new Nurse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nurse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'usertype_ut_id' => $model->usertype_ut_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Nurse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $usertype_ut_id
     * @return mixed
     */
    public function actionUpdate($id, $usertype_ut_id)
    {
        $model = $this->findModel($id, $usertype_ut_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'usertype_ut_id' => $model->usertype_ut_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Nurse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $usertype_ut_id
     * @return mixed
     */
    public function actionDelete($id, $usertype_ut_id)
    {
        $this->findModel($id, $usertype_ut_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nurse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $usertype_ut_id
     * @return Nurse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $usertype_ut_id)
    {
        if (($model = Nurse::findOne(['id' => $id, 'usertype_ut_id' => $usertype_ut_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
