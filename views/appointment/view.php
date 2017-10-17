<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'ข้อมูลนัดพบแพทย์ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
$this->params['breadcrumbs'][] = ['label' => 'นัดพบแพทย์', 'url' => ['appointment/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-view">

    <p>
        <?= Html::a('แก้ไข', ['update', 'ID' => $model->ID, 'nurse_id' => $model->nurse_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' => $model->doctor_iddoctor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'ID' => $model->ID, 'nurse_id' => $model->nurse_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' => $model->doctor_iddoctor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณต้องการลบจริงหรือไม่ ?',
                'method' => 'post',
            ],
        ]) ?>
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
           'casetypevalue',
            'detial:ntext',
            'appointment_time',
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
