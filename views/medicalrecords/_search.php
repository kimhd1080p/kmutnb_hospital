<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppointmentSearch */
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

<div class="appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['appointments'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'ID') ?>

   <?php echo $form->field($model, 'appointment_time')->textInput(['id' => 'datepicker1'])->label('ค้นหาจากวันที่') ?>

     <?php // echo $form->field($model, 'medical_certificate') ?>

    <?php // echo $form->field($model, 'todoctor') ?>

    <?php // echo $form->field($model, 'timestam')->textInput(['id' => 'datepicker1'])->label('ค้นหาจากวันที่') ?>

    <?php // echo $form->field($model, 'detial') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'user_id2') ?>

    <?php // echo $form->field($model, 'patient_p_pid') ?>

    <?php // echo $form->field($model, 'patient_p_sid') ?>

    <?php // echo $form->field($model, 'casetype_idcasetype') ?>

    <?php // echo $form->field($model, 'doctor_iddoctor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
