<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'รายละเอียดการนัดพบแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'งานเวชระเบียน', 'url' => ['medicalrecords/index']];
$this->params['breadcrumbs'][] = ['label' => 'รายการนัดพบแพทย์', 'url' => ['medicalrecords/index2']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-view">

    <p>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'ID',
         'patient_p_pid',
            'patient_p_sid',
              [  
        'label' => 'ชื่อ-นามสกุล',
        'value' => $model->patient->p_name.' '.$model->patient->p_surname ,
    ],
            'casetypevalue',
            'detial:ntext',
            'appointment_time',
                 'patient.documentindex',
          [
    'label' => 'ขอใบรับรองแพทย์',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->medical_certificate === 1) {
            return 'ใช่'; // "x" icon in red color
        } else {
            return 'ไม่ใช่'; // check icon 
        }
    },
],
            [
    'label' => 'พบแพทย์แล้ว',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->todoctor === 1) {
            return '<i class="fa fa-check-square"></i>'; // "x" icon in red color
        } else {
            return '<i class="fa fa-times"></i>'; // check icon 
        }
    },
],
             
           [  
        'label' => 'ผู้ให้บริการ',
        'value' => $model->user->u_name." ".$model->user->nursetype->type ,
    ],
            [  
        'label' => 'ผู้ยืนยันนัด',
        'value' => @$model->user1->u_name." ".@$model->user1->nursetype->type ,
    ],
            
         
            'doctor.doctor',
            'timestam',
   
            
         
        ],
    ]) ?>

</div>
