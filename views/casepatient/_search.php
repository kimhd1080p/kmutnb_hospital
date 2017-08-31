<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CasepatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="casepatient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idcase') ?>

    <?= $form->field($model, 'case_detail') ?>

    <?= $form->field($model, 'timestam') ?>

    <?= $form->field($model, 'dispense') ?>

    <?= $form->field($model, 'idservices') ?>

    <?php // echo $form->field($model, 'casetype_idcasetype') ?>

    <?php // echo $form->field($model, 'iddoctor') ?>

    <?php // echo $form->field($model, 'p_pid') ?>

    <?php // echo $form->field($model, 'p_sid') ?>

    <?php // echo $form->field($model, 'nurse_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
