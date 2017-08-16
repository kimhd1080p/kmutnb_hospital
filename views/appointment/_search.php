<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'appointment_time') ?>

    <?= $form->field($model, 'medical_certificate') ?>

    <?= $form->field($model, 'todoctor') ?>

    <?= $form->field($model, 'timestam') ?>

    <?php // echo $form->field($model, 'detial') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'user_id2') ?>

    <?php // echo $form->field($model, 'patient_p_pid') ?>

    <?php // echo $form->field($model, 'patient_p_sid') ?>

    <?php // echo $form->field($model, 'casetype_idcasetype') ?>

    <?php // echo $form->field($model, 'doctor_iddoctor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
