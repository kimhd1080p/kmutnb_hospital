
<?php
use yii\helpers\Html;
use yii\helpers\Url;

//use app\controllers\NurseserviceController; 

//echo NurseserviceController::actionIndex(); 
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */




  //if(empty($session['userid'])){
  //  return $this->render('login');}
//$id=Yii::$app->user->id;
//echo $id;pri
//print_r ($session['userid']);


/* @var $this yii\web\View */
//echo Yii::$app->user->isGuest;
print_r (@Yii::$app->user->identity->u_name);

echo "5555";
$this->registerJsFile(
    '@web/js/jquery.js'
);
$this->registerJsFile(
    '@web/js/jquery.datetimepicker.full.js'
);

$this->registerJsFile(
    '@web/js/jsdtp.js'
);

//print_r (Yii::$app->user);
//echo Url::to(['patientsearch']);
 //echo Yii::$app->NurseserviceController->action->id;
echo date("Y-m-d H:i:s");
?>

<input type="text" value="" id="datetimepicker_mask"/><br><br>

