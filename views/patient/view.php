<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'ดูผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ผู้ป่วย', 'url' => ['patient/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">

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
        <?= Html::a('แก้ไข', ['update', 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'status_id' => $model->status_id, 'department_id' => $model->department_id, 'studentclass_id' => $model->studentclass_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'status_id' => $model->status_id, 'department_id' => $model->department_id, 'studentclass_id' => $model->studentclass_id], [
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
            'p_name',
            'p_surname',
            'sex',
            'p_birthday',
            'p_address',
            'p_tel',
            'p_allegy',
            'p_disease',
            'documentindex',
            'status.status',
            'department.department_name',
            'studentclass.studentclass',
        ],
    ]) ?>

</div></div>
</div>
    </div>
