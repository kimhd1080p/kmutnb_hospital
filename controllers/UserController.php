<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
       
        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash=Yii::$app->security->generatePasswordHash($model->password_hash);
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
            //สร้างตามสิทธิ์การใช้งาน
             $id=$model->id;
              $time=Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            if($model->type==1){
   $auth_assignment = Yii::$app->db->createCommand("INSERT INTO auth_assignment VALUES ('Boss','$id','$time')")
            ->execute();
   }
   if($model->type==2){
   $auth_assignment = Yii::$app->db->createCommand("INSERT INTO auth_assignment VALUES ('Nurse','$id','$time')")
            ->execute();
   }
    if($model->type==3){
   $auth_assignment = Yii::$app->db->createCommand("INSERT INTO auth_assignment VALUES ('Medicalrecords','$id','$time')")
            ->execute();
   }
            return $this->redirect(['view', 'id' => $model->id]);
            } } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $user = User::find()->where([
                'id'=>$id
            ])->one();
            if($user->password_hash==$model->password_hash){
                $model->password_hash=$user->password_hash;
            }else{
                $model->password_hash=Yii::$app->security->generatePasswordHash($model->password_hash);
            }
                
            if($model->save()){
            
            $id=$model->id;
              
            if($model->type==1){
   $auth_assignment = Yii::$app->db->createCommand("UPDATE `auth_assignment` SET `item_name`='Boss' WHERE `user_id`='$id'")
            ->execute();
   }
   if($model->type==2){
      $auth_assignment = Yii::$app->db->createCommand("UPDATE `auth_assignment` SET `item_name`='Nurse' WHERE `user_id`='$id'")
            ->execute();
   }
    if($model->type==3){
$auth_assignment = Yii::$app->db->createCommand("UPDATE `auth_assignment` SET `item_name`='Medicalrecords' WHERE `user_id`='$id'")
            ->execute();
   }
   
            return $this->redirect(['view', 'id' => $model->id]);
            }  } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       $auth_assignment = Yii::$app->db->createCommand("DELETE FROM `auth_assignment` WHERE `user_id`='$id'")
            ->execute(); 
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
