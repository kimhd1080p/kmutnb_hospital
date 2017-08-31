<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Medicinetype;
/* @var $this yii\web\View */
/* @var $model app\models\Medicine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'idmedicinetype')->textInput()
            ->dropDownList(
            ArrayHelper::map(Medicinetype::find()->asArray()->all(), 'idmedicinetype', 'medicinetype'),['prompt'=>'เลือก']
            ) ?>
    <?= $form->field($model, 'idmedicine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medicine')->textInput(['maxlength' => true]) ?>
     <?= $form->field($model, 'medicinesize')->textInput(['maxlength' => true]) ?>



   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
