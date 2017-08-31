<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Nursetype;
/* @var $this yii\web\View */
/* @var $model app\models\Nurse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nurse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usertype_ut_id')->dropDownList(
            ArrayHelper::map(Nursetype::find()->asArray()->all(), 'ut_id', 'type'),['prompt'=>'เลือก']
            ) ?>
    <?= $form->field($model, 'n_status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
