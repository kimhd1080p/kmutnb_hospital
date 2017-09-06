<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Casepatient;
use app\models\Medicine;
use app\models\Medicinepackage;
use app\models\Medicinetime;
use app\models\Medicinerecommend;
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

    <?= $form->field($model, 'take1')->radioList([
    1 => 'รับประทาน', 
    2 => 'อม',
         3 => 'เคี้ยว',
]) ?>

    <?= $form->field($model, 'take2')->textInput() ?>

    <?= $form->field($model, 'take3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'take4')->radioList([
    1 => 'ก่อนอาหาร', 
    2 => 'หลัง',
      
]) ?>

    <?= $form->field($model, 'take5')->checkboxList(
            ArrayHelper::map(Medicinetime::find()->all(), 'idmedicinetime', 'medicinetime'),['prompt'=>'เลือกประเภทอาการ']
            ) ?>

    <?= $form->field($model, 'take6')->textInput() ?>

    <?= $form->field($model, 'take7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'take8')->checkboxList(
            ArrayHelper::map(Medicinerecommend::find()->all(), 'idmedicinerecommend', 'medicinerecommend'),['prompt'=>'เลือกประเภทอาการ']
            ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ตกลง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
