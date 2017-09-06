<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Casepatient;
use app\models\Medicine;
use app\models\Medicinepackage;
$session = Yii::$app->session;

/* @var $this yii\web\View */
/* @var $model app\models\Casemedicine */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(
    '@web/js/jquery.js'
);
$this->registerJsFile(
    '@web/js/jquery.datetimepicker.full.js'
);

$this->registerJsFile(
    '@web/js/jsdtp.js'
);
?>

<div class="casemedicine-form">

      <?php $form = ActiveForm::begin(); ?>
<?php //$sql = 'SELECT * FROM casepatient WHERE DATE(timestam) = CURDATE() and p_pid='.$session['pid'];
$sql = 'SELECT * FROM casepatient WHERE p_pid='.$session['pid'];
?>
    <?= $form->field($model, 'idcase') ->dropDownList(
            ArrayHelper::map(Casepatient::findBySql($sql)->all(), 'idcase', 'casetypevalue','timestam'),['prompt'=>'เลือก']
            ) ?>
    
    <?= $form->field($model, 'idmedicine') ->dropDownList(
            ArrayHelper::map(Medicine::find()->joinWith('medicinetype')->asArray()->all(), 'idmedicine', 'medicine','medicinetype.medicinetype'),['prompt'=>'เลือกยา']
            )  ?>
    
  <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'medicinepackage_id')->radioList(
            ArrayHelper::map(Medicinepackage::find()->asArray()->all(), 'id', 'package'),['prompt'=>'เลือกยา']
            )  ?>
 <?= $form->field($model, 'expired_date')->textInput(['id' => 'default_datetimepicker'])

 ?>
   <label for="eat1">วิธีรับประทาน</label>
     <?= Html::radioList('eat1','',[
    1 => 'รับประทาน', 
    2 => 'อม',
         3 => 'เคี้ยว',
],['id' => 'eat1']) ?>
   <label for="eat2">ครั้งละ</label>
     <?= Html::textInput('eat2','',['id' => 'eat2']) ?>
   <label for="eat2">วันละ</label>
     <?= Html::textInput('eat3','',['id' => 'eat3']) ?>

     <?= Html::radioList('eat4','',[
    1 => 'ก่อนอาหาร', 
    2 => 'หลัง',
      
],['id' => 'eat4']) ?>
   <?= Html::checkboxList('eat5','',[
    1 => 'เช้า', 
    2 => 'กลางวัน',
        3 => 'เย็น',
        4 => 'ก่อนนอน',
],['id' => 'eat5']) ?>
    <label for="eat6">ทุก</label>
     <?= Html::textInput('eat6','',['id' => 'eat6']) ?> ชั่วโมง หรือเมื่อ <?= Html::textInput('eat7','',['id' => 'eat7']) ?>
      <?= Html::checkboxList('eat8','',[
    1 => 'ทานติดต่อกันจนหมด', 
    2 => 'ยานี้อาจทำให้ง่วงซึมได้',
        3 => 'ดื่มน้ำตามมาก',
        4 => 'อื่นๆ',
],['id' => 'eat8']) ?>
        
        <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
