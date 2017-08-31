<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MedicineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idmedicine') ?>

    <?= $form->field($model, 'medicine') ?>

    <?= $form->field($model, 'idmedicinetype') ?>

    <?= $form->field($model, 'medicinesize') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
