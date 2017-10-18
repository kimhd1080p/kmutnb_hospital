<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nurse */

$this->title = 'ดูพนักงาน';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'พนักงาน', 'url' => ['nurse/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-view">
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
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id, 'usertype_ut_id' => $model->usertype_ut_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id, 'usertype_ut_id' => $model->usertype_ut_id], [
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
            'id',
            'name',
            'nursetype.type',
            [
    'label' => 'สถานะ',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->n_status === 1) {
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