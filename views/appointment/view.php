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
        <?= Html::a('แก้ไข', ['update', 'ID' => $model->ID, 'user_id' => $model->user_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' => $model->doctor_iddoctor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'ID' => $model->ID, 'user_id' => $model->user_id, 'patient_p_pid' => $model->patient_p_pid, 'patient_p_sid' => $model->patient_p_sid, 'casetype_idcasetype' => $model->casetype_idcasetype, 'doctor_iddoctor' => $model->doctor_iddoctor], [
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
            
             
            'doctor.doctor',
            'timestam',
        ],
    ]) ?>

</div>
