<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */

$this->title = 'ดูคณะ';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'คณะ', 'url' => ['faculty/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-view">
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
        <?= Html::a('แก้ไข', ['update', 'id' => $model->idfaculty], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->idfaculty], [
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
            'idfaculty',
            'faculty',
        ],
    ]) ?>

</div>
</div>
</div>
</div>