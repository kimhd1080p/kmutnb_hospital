<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $model app\models\Casepatient */

$this->title = 'ดูประวัติ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid'],'sid'=>$session['sid']]];
$this->params['breadcrumbs'][] = ['label' => 'ประวัติ', 'url' => ['casepatient/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casepatient-view">

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
    echo Html::a(Yii::t('rbac-admin', 'แก้ไข'), ['update', 'idcase' => $model->idcase, 'idservices' => $model->idservices, 'casetype_idcasetype' => $model->casetype_idcasetype, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'nurse_id' => $model->nurse_id], [
        'class' => 'btn btn-primary',
        //'data-method' => 'post',
    ]);
}
        ?>
 <?php
        if(Helper::checkRoute('delete')){
    echo Html::a(Yii::t('rbac-admin', 'ลบ'), ['delete', 'idcase' => $model->idcase, 'idservices' => $model->idservices, 'casetype_idcasetype' => $model->casetype_idcasetype, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'nurse_id' => $model->nurse_id], [
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
              'p_pid',
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
            
            
            
            
            
            
            
            
            //'idcase',
            
           
            //'nurse.name',
        ],
    ]) ?>

</div>
</div>
 
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa   fa-th-list"></i>รายละเอียดอาการป่วย</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                      'casetypevalue',
           
            'case_detail',
            'timestam',
            [  
        'label' => 'บริการที่ได้รับ',
        'value' => $model->servicesvalue ,
    ],
            //'servicesvalue',
         // 'dispense',
            [
    'label' => 'จ่ายยา',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->dispense === 1) {
            return '<i class="fa fa-check-square text-green"></i>'; // "x" icon in red color
        } else {
            return '<i class="fa fa-times text-red"></i>'; // check icon 
        }
    },
],
            'doctor.doctor',
    [  
        'label' => 'ผู้บันทึก',
                'value' => $model->user->u_name." ".$model->user->nursetype->type ,
    ],
        
        ],
    ]) ?>

   

</div>
         </div>
</div>
      </div>
</div>