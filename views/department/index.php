<?php

use yii\helpers\Html;
use kartik\grid\GridView;
  use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ภาควิชา/ส่วนงาน';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="department-index">
 <div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-user-plus"></i>เพิ่มภาควิชา/ส่วนงาน</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddepartment',
            'department_name',
            'department_name2',
            'faculty.faculty',

            [
        'class' => 'yii\grid\ActionColumn',
        'template' => Helper::filterActionColumn('{view}{update}{delete}'),
    ]
        ],
    ]); ?>
</div>
</div>
</div>
</div>
