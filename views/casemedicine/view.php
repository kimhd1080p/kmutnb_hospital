<?php

use yii\helpers\Html;

use yii\widgets\DetailView;
$session = Yii::$app->session;

/* @var $this yii\web\View */
/* @var $model app\models\Casemedicine */

$this->title = 'ดูการจ่ายยา คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid'],'sid'=>$session['sid']]];
$this->params['breadcrumbs'][] = ['label' => 'จ่ายยา', 'url' => ['casemedicine/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casemedicine-view">

 
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
        <?= Html::a('แก้ไข', ['update', 'ID' => $model->ID, 'idcase' => $model->idcase, 'idmedicine' => $model->idmedicine, 'medicinepackage_id' => $model->medicinepackage_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'ID' => $model->ID, 'idcase' => $model->idcase, 'idmedicine' => $model->idmedicine, 'medicinepackage_id' => $model->medicinepackage_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณต้องการจะลบรายการนี้ ใช่หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'casepatient.p_pid',
            //'patient_p_sid',
            [
    'label' => 'รหัสนักศึกษา',
    'format' => 'raw',
    'value' => $model->casepatient->patient->student,
    'visible' => (!empty($model->casepatient->patient->student)),           
],
            
              [  
        'label' => 'ชื่อ-นามสกุล',
        'value' => $model->casepatient->patient->p_name.' '.$model->casepatient->patient->p_surname ,
    ],
            'casepatient.patient.status.status',
            'casepatient.patient.p_birthday',
            'casepatient.patient.age',
            'casepatient.patient.p_allegy',
            'casepatient.patient.p_disease',
          
            //'patient.class',
             [
    'label' => 'ระดับชั้น',
    'format' => 'raw',
    'value' => $model->casepatient->patient->class,
    'visible' => (!empty($model->casepatient->patient->class)),           
],
            'casepatient.patient.status.status',
              'casepatient.patient.department.department_name',
            'casepatient.patient.department.faculty.faculty',
            
            
            
            
            
             
        ],
    ]) ?>

</div>
</div>
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa   fa-th-list"></i>รายละเอียดการจ่ายยา</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                    'ID',
            'casepatient.timestam',
            'casepatient.casetypevalue',
            'casepatient.case_detail',
             'casepatient.servicesvalue',
            'medicine.medicine',
            'qty',
            'medicinepackage.package',
            'expired_date',
            'properties',
            'howto',
            'note',
        
        ],
    ]) ?>

   

</div>
         </div>
</div>
    </div>