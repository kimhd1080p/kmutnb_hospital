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
 <div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa   fa-th-list"></i>ข้อมูลผู้ป่วย</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            'patient_p_pid',
            //'patient_p_sid',
            [
    'label' => 'รหัสนักศึกษา',
    'format' => 'raw',
    'value' => $model->patient->student,
    'visible' => (!empty($model->patient->student)),           
],
            
              [  
        'label' => 'ชื่อ-นามสกุล',
        'value' => $model->patient->p_name.' '.$model->patient->p_surname ,
    ],
            'patient.status.status',
            'patient.p_birthday',
            'patient.age',
            'patient.p_allegy',
            'patient.p_disease',
          
            //'patient.class',
             [
    'label' => 'ระดับชั้น',
    'format' => 'raw',
    'value' => $model->patient->class,
    'visible' => (!empty($model->patient->class)),           
],
            'patient.status.status',
              'patient.department.department_name',
            'patient.department.faculty.faculty',
           // 'casetypevalue',
            //'detial:ntext',
            //'appointment_time',
                // 'patient.documentindex',
            ['attribute'=>'patient.documentindex',
         'format'=>'raw',
         'value'=> function ($model){
     $pid=$model['patient_p_pid'];
     $sid=$model['patient_p_sid'];
        if($model->patient->documentindex == null){
            return Html::a(Html::encode('เพิ่มที่อยู่เอกสาร'),['//patient/update','p_pid'=>$pid,'p_sid'=>$sid]);
        }else{
            return $model->patient->documentindex; 
        }
  
         }
       ,],

            
             
           
            
          
            //'doctor.doctor',
            //'timestam',
        ],
    ]) ?>

   

</div>
         </div>
 
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa   fa-th-list"></i>รายละเอียดการนัด</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
          
            //'patient.status.status',
            'casetypevalue',
            'detial:ntext',
            'appointment_time',
                // 'patient.documentindex',
            
[
    'label' => 'ขอใบรับรองแพทย์',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->medical_certificate === 1) {
           return '<i class="fa fa-check-square text-green"></i>'; // "x" icon in red color
        } else {
            return '<i class="fa fa-times text-red"></i>'; // check icon 
        }
    },
],
            [
    'label' => 'พบแพทย์แล้ว',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->todoctor === 1) {
            return '<i class="fa fa-check-square text-green"></i>'; // "x" icon in red color
        } else {
            return '<i class="fa fa-times text-red"></i>'; // check icon 
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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
         </div>

 </div>

    </div>