<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = 'ดูยา';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ยา', 'url' => ['medicine/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-view">

  
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
        <?= Html::a('แก้ไข', ['update', 'idmedicine' => $model->idmedicine, 'idmedicinetype' => $model->idmedicinetype], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'idmedicine' => $model->idmedicine, 'idmedicinetype' => $model->idmedicinetype], [
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
       
            'idmedicine',
           
            'medicine',
            'properties',
            'howto',
            'note',
                  'medicinetype.medicinetype',
        ],
    ]) ?>

</div>
</div>
</div>
    </div>