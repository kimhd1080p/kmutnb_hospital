<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Doctortype;
/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'doctor')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'doctortype_id')->dropDownList(
            ArrayHelper::map(Doctortype::find()->asArray()->all(), 'id', 'doctortype'),['prompt'=>'เลือก']
            ) ?>

    <?= $form->field($model, 'd_status')->checkbox()?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
