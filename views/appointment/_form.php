<?php

$session = Yii::$app->session;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Casedoctortype;
use app\models\Doctor;
use app\models\User;
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
<div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>ฟอร์ม</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'casetype_idcasetype')
     ->checkboxList(
            ArrayHelper::map(Casedoctortype::find()->all(), 'id', 'name'),['prompt'=>'เลือกประเภทอาการ']
            ) ?>
        <?= $form->field($model, 'detial')->textarea(['rows' => 6]) ?>
    

    <?= $form->field($model, 'appointment_time')->textInput(['id' => 'default_datetimepicker'])

 ?>

    <?= $form->field($model, 'medical_certificate')->checkbox() ?>




  

<?= $form->field($model, 'patient_p_pid')->hiddenInput(['maxlength' => true,'value' => $session['pid'],])->label(false); ?>

    <?= $form->field($model, 'patient_p_sid')->hiddenInput(['maxlength' => true,'value' => $session['sid'],])->label(false); ?>
   
    <?= $form->field($model, 'doctor_iddoctor')->textInput()  ->dropDownList(
            ArrayHelper::map(Doctor::find()->where(['d_status' => 1])->asArray()->all(), 'iddoctor', 'doctor'),['prompt'=>'เลือก']
            ) ?>
     <?= $form->field($model, 'nurse_id')->dropDownList(
            ArrayHelper::map(User::find()->where(['type' => 2,'status' => 10])->asArray()->all(), 'id', 'u_name'),['prompt'=>'เลือก']
            ) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
    </div>