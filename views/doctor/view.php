<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
  use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
$this->title = 'ดูแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'แพทย์', 'url' => ['doctor/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-view">

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
    echo Html::a(Yii::t('rbac-admin', 'แก้ไข'), ['update', 'iddoctor' => $model->iddoctor, 'doctortype_id' => $model->doctortype_id], [
        'class' => 'btn btn-primary',
        //'data-method' => 'post',
    ]);
}
        ?>
 <?php
        if(Helper::checkRoute('delete')){
    echo Html::a(Yii::t('rbac-admin', 'ลบ'), ['delete', 'iddoctor' => $model->iddoctor, 'doctortype_id' => $model->doctortype_id], [
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
            'iddoctor',
            'doctor',
             'doctortype.doctortype',
           [
    'label' => 'สถานะ',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->d_status === 1) {
            return 'ใช้งาน'; // "x" icon in red color
        } else {
            return 'ไม่ใช้งาน'; // check icon 
        }
    },
],
        ],
    ]) ?>
</div>
</div>
    </div>
</div>
