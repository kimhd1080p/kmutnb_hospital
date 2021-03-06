<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
  use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'ดูผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ผู้ป่วย', 'url' => ['patient/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">
<div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>รายละเอียด</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
   

    <p>
        
        
          <?php
        if(Helper::checkRoute('update')){
    echo Html::a(Yii::t('rbac-admin', 'แก้ไข'), ['update','p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'status_id' => $model->status_id, 'department_id' => $model->department_id, 'studentclass_id' => $model->studentclass_id], [
        'class' => 'btn btn-primary',
        //'data-method' => 'post',
    ]);
}
        ?>
 <?php
        if(Helper::checkRoute('delete')){
    echo Html::a(Yii::t('rbac-admin', 'ลบ'), ['delete', 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'status_id' => $model->status_id, 'department_id' => $model->department_id, 'studentclass_id' => $model->studentclass_id], [
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
            //'student',
            [
    'label' => 'รหัสนักศึกษา',
    'format' => 'raw',
    'value' => $model->student,
    'visible' => (!empty($model->student)),           
],
            
   
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
