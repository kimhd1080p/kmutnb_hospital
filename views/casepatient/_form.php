<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="case-patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'case_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'timestam')->textInput() ?>

    <?= $form->field($model, 'dispense')->textInput() ?>

    <?= $form->field($model, 'casetype_idcasetype')->textInput() ?>

    <?= $form->field($model, 'idservices')->textInput() ?>

    <?= $form->field($model, 'iddoctor')->textInput() ?>

    <?= $form->field($model, 'p_pid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_sid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
