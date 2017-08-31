<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'ยืนยันการมาพบแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'งานเวชระเบียน', 'url' => ['medicalrecords/index']];
$this->params['breadcrumbs'][] = ['label' => 'รายการนัดพบแพทย์', 'url' => ['medicalrecords/index2']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-update">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'patient_p_pid',
            'patient_p_sid',
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
        'label' => 'พยาบาล',
        'value' => $model->user->u_name.' '.$model->user->u_surname ,
    ],
            [  
        'label' => 'เวชระเบียน',
        'value' => @$model->user1->u_name.' '.@$model->user1->u_surname ,
    ],
            
              'patient.documentindex',
            'doctor.doctor',
            'timestam',
        ],
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
