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
            'ID',
            'patient_p_pid',
              [  
        'label' => 'ชื่อ-นามสกุล',
        'value' => $model->patient->p_name.' '.$model->patient->p_surname ,
    ],
            'casetype.casetype',
            'detial:ntext',
            'appointment_time',
            'medical_certificate',
            'todoctor',
             
             [  
        'label' => 'ผู้ให้บริการ',
        'value' => $model->nurse->name." ".$model->nurse->nursetype->type ,
    ],
            [  
        'label' => 'ผู้ยืนยันนัด',
        'value' => @$model->nurse1->name." ".@$model->nurse1->nursetype->type ,
    ],
   
            
             
            'doctor.doctor',
            'timestam',
        ],
    ]) ?>

</div>
