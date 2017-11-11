<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แพทย์';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

     <div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-user-md"></i>เพิ่มแพทย์ผู้ตรวจ</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'panel'=>['before'=>"รายการแพทย์"],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

   
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
          

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
</div>
