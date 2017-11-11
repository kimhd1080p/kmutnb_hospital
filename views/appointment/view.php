<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;
$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'ข้อมูลนัดพบแพทย์ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid'],'sid'=>$session['sid']]];
$this->params['breadcrumbs'][] = ['label' => 'นัดพบแพทย์', 'url' => ['appointment/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-view">
<div class="case-patient-form">
<div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>ข้อมูลผู้ป่วย</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <p>
      
        
          <?php
        if(Helper::checkRoute('update')){
    echo Html::a(Yii::t('rbac-admin', 'แก้ไข'), ['update','ID' => $model->ID, 'nurse_id' => $model->nurse_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' =>  $model->doctor_iddoctor], [
        'class' => 'btn btn-primary',
        'data-method' => 'post',
    ]);
}
        ?>
 <?php
        if(Helper::checkRoute('delete')){
    echo Html::a(Yii::t('rbac-admin', 'ลบ'), ['delete', 'ID' => $model->ID, 'nurse_id' => $model->nurse_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' =>  $model->doctor_iddoctor], [
        'class' => 'btn btn-danger',
        'data-confirm' => Yii::t('rbac-admin', 'คุณต้องการจะลบรายการนี้ ใช่หรือไม่?'),
        'data-method' => 'post',
    ]);
}
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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

   

</div>
         </div>
 </div>
</div>