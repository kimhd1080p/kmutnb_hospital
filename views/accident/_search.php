<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccidentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accident-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idaccident') ?>

    <?= $form->field($model, 'timestam') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'note') ?>

    <?= $form->field($model, 'accidenttype_idaccidenttype') ?>

    <?php // echo $form->field($model, 'medicaltreatment_idmedicaltreatment') ?>

    <?php // echo $form->field($model, 'p_pid') ?>

    <?php // echo $form->field($model, 'p_sid') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'inlocattype_idinlocattype') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
