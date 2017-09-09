<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CasemedicineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="casemedicine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'idcase') ?>

    <?= $form->field($model, 'idmedicine') ?>

    <?= $form->field($model, 'medicinepackage_id') ?>

    <?= $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'expired_date') ?>

    <?php // echo $form->field($model, 'take1') ?>

    <?php // echo $form->field($model, 'take2') ?>

    <?php // echo $form->field($model, 'take3') ?>

    <?php // echo $form->field($model, 'take4') ?>

    <?php // echo $form->field($model, 'take5') ?>

    <?php // echo $form->field($model, 'take6') ?>

    <?php // echo $form->field($model, 'take7') ?>

    <?php // echo $form->field($model, 'take8') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
