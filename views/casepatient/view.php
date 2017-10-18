<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $model app\models\Casepatient */

$this->title = 'ดูประวัติ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
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
              <li class="pull-left header"><i class="fa  fa-file-text"></i>ฟอร์ม</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">

    <p>
        <?= Html::a('Update', ['update', 'idcase' => $model->idcase, 'idservices' => $model->idservices, 'casetype_idcasetype' => $model->casetype_idcasetype, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'nurse_id' => $model->nurse_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idcase' => $model->idcase, 'idservices' => $model->idservices, 'casetype_idcasetype' => $model->casetype_idcasetype, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'nurse_id' => $model->nurse_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idcase',
            'p_pid',
            [  
        'label' => 'ชื่อ-นามสกุล',
        'value' => $model->patient->p_name.' '.$model->patient->p_surname ,
    ],
            'casetypevalue',
           
            'case_detail',
            'timestam',
            [  
        'label' => 'บริการที่ได้รับ',
        'value' => $model->servicesvalue ,
    ],
            //'servicesvalue',
          'dispense',
            'doctor.doctor',
    [  
        'label' => 'ผู้บันทึก',
        'value' => $model->nurse->name." สายงาน".$model->nurse->nursetype->type ,
    ],
            //'nurse.name',
        ],
    ]) ?>

</div>
</div>
</div>
      </div>
</div>