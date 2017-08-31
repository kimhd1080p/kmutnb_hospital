<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p_pid') ?>

    <?= $form->field($model, 'p_sid') ?>

    <?= $form->field($model, 'p_name') ?>

    <?= $form->field($model, 'p_surname') ?>

    <?= $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'p_birthday') ?>

    <?php // echo $form->field($model, 'p_address') ?>

    <?php // echo $form->field($model, 'p_tel') ?>

    <?php // echo $form->field($model, 'p_allegy') ?>

    <?php // echo $form->field($model, 'p_disease') ?>

    <?php // echo $form->field($model, 'documentindex') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <?php // echo $form->field($model, 'studentclass_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
