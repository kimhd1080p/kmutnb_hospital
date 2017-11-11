<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicinetype */

$this->title = 'ดูประเภทยา';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ประเภทยา', 'url' => ['medicinetype/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicinetype-view">
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
        <?= Html::a('แก้ไข', ['update', 'id' => $model->idmedicinetype], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->idmedicinetype], [
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
            'idmedicinetype',
            'medicinetype',
        ],
    ]) ?>

</div>
</div>
</div>
    </div>