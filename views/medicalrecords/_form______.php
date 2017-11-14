<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
  use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin([]); ?>

    

   <?= $form->field($model, 'nurse_id2')->dropDownList(
            ArrayHelper::map(User::find()->where(['type' => 3,'status' => 10])->asArray()->all(), 'id', 'u_name'),[
                
                ]
            ) ?>

<?php //$model->todoctor=1; ?>

    <?php echo $form->field($model, 'todoctor')->checkbox(); ?>
    
    <div class="form-group">
        <?php
       
            

//        if($model->todoctor==1&&$model->nurse_id2 != null){   
//        echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ยืนยัน', ['class' => $model->isNewRecord ? 'btn btn-primary ' : 'btn btn-primary ', 'disabled' => 'disabled',]);}
// else {
//     echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ยืนยัน', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']);
// }
        ?>
        <?php
        if(date("Y-m-d", strtotime($model->appointment_time))==date("Y-m-d")){
             //$model->todoctor==1;
            echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ยืนยัน', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']);
        }else {echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ยืนยัน', ['class' => $model->isNewRecord ? 'btn btn-primary ' : 'btn btn-primary ', 'disabled' => 'disabled',]);}
      // echo $model->timestam;
//            if(date("Y-m-d", strtotime($model->timestam))==date("Y-m-d")){
////                    if(Helper::checkRoute('delete')){
////    echo Html::a(Yii::t('rbac-admin', 'ยกเลิก'), ['delete', 'ID' => $model->ID, 'nurse_id' => $model->nurse_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' =>  $model->doctor_iddoctor], [
////        'class' => 'btn btn-danger',
////        'data-confirm' => Yii::t('rbac-admin', 'คุณต้องการจะยกเลิกรายการนัดครั้งนี้ ใช่หรือไม่?'),
////        'data-method' => 'post',
////    ]);
////}
//                
//                $model->todoctor==0;
//                echo Html::submitButton('ยกเลิก', ['class'=>'btn btn-danger',]) ;
//                
//            }else {echo Html::submitButton('ยกเลิก', ['class'=>'btn btn-danger', 'disabled' => 'disabled']) ;}
        

        ?>
      
        
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
