<?php

$session = Yii::$app->session;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Casetype;
use app\models\Doctor;
use app\models\Nurse;
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */
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

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'casetype_idcasetype')
     ->checkboxList(
            ArrayHelper::map(Casetype::find()->all(), 'idcasetype', 'casetype'),['prompt'=>'เลือกประเภทอาการ']
            ) ?>
        <?= $form->field($model, 'detial')->textarea(['rows' => 6]) ?>
    

    <?= $form->field($model, 'appointment_time')->textInput(['id' => 'default_datetimepicker'])

 ?>

    <?= $form->field($model, 'medical_certificate')->checkbox() ?>




  

<?= $form->field($model, 'patient_p_pid')->hiddenInput(['maxlength' => true,'value' => $session['pid'],])->label(false); ?>

    <?= $form->field($model, 'patient_p_sid')->hiddenInput(['maxlength' => true,'value' => $session['sid'],])->label(false); ?>
   
    <?= $form->field($model, 'doctor_iddoctor')->textInput()  ->dropDownList(
            ArrayHelper::map(Doctor::find()->asArray()->all(), 'iddoctor', 'doctor'),['prompt'=>'เลือก']
            ) ?>
    <?= $form->field($model, 'nurse_id')->dropDownList(
            ArrayHelper::map(Nurse::find()->asArray()->all(), 'id', 'name'),['prompt'=>'เลือก']
            ) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
