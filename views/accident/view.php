<?php
$session = Yii::$app->session;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Accident */

$this->title = 'ดูบันทึกอุบัติเหตุ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
$this->params['breadcrumbs'][] = ['label' => 'บันทึกอุบัติเหตุ', 'url' => ['accident/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accident-view">

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
        <?= Html::a('แก้ไข', ['update', 'idaccident' => $model->idaccident, 'accidenttype_idaccidenttype' => $model->accidenttype_idaccidenttype, 'medicaltreatment_idmedicaltreatment' => $model->medicaltreatment_idmedicaltreatment, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'inlocattype_idinlocattype' => $model->inlocattype_idinlocattype], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'idaccident' => $model->idaccident, 'accidenttype_idaccidenttype' => $model->accidenttype_idaccidenttype, 'medicaltreatment_idmedicaltreatment' => $model->medicaltreatment_idmedicaltreatment, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'inlocattype_idinlocattype' => $model->inlocattype_idinlocattype], [
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
            'p_pid',
            'p_sid',
                 [  
        'label' => 'ชื่อ-นามสกุล',
        'value' => $model->patient->p_name.' '.$model->patient->p_surname ,
    ],
            'inlocattype.inlocattype',
            
            'location',
            
            'accidenttype.accidenttype',
            'medicaltreatment.medicaltreatment',
            'note',
            'timestam',
            // 'user:u_name',
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