<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Nurse;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>

    

   <?= $form->field($model, 'nurse_id2')->dropDownList(
            ArrayHelper::map(Nurse::find()->where(['usertype_ut_id' => 2,'n_status' => 1])->asArray()->all(), 'id', 'name'),[
                
                ]
            ) ?>



    <?= $form->field($model, 'todoctor')->checkbox() ?>
    
    <div class="form-group">
        <?php
                

        if($model->todoctor==1){   
        echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ยืนยัน', ['class' => $model->isNewRecord ? 'btn btn-primary ' : 'btn btn-primary ', 'disabled' => 'disabled']);}
 else {
     echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ยืนยัน', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']);
 }
        ?>
      
        
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
