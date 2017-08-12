<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Patient;
use app\models\PatientSearch;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
 $model = new PatientSearch();
?>

<div class="patient-search">

    <?php $form = ActiveForm::begin([
        'action' => [''],
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'p_pid') ?>

    <?php // $form->field($model, 'p_sid') ?>

    <?php //$form->field($model, 'p_name') ?>

    <?php //$form->field($model, 'p_surname') ?>

    <?php //$form->field($model, 'p_birthday') ?>

    <?php // echo $form->field($model, 'p_address') ?>

    <?php // echo $form->field($model, 'p_tel') ?>

    <?php // echo $form->field($model, 'p_allegy') ?>

    <?php // echo $form->field($model, 'p_disease') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <?php // echo $form->field($model, 'studentclass_id') ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
   
    </div>

    <?php ActiveForm::end(); ?>

</div>

