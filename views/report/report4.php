<?php
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasepatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานการปฏิบัติงานของเจ้าหน้าที่ นอกเวลาราชการ';
//$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
//$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
//$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="casepatient-index">
<div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>รายงาน</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
 <?php  echo $this->render('_search'); ?>
    
 <?php if(isset($dataProvider1)):?>
 
 <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายงานการปฏิบัติงานของเจ้าหน้า นอกเวลาราชการ  ".$dates." - ".$datee],
       
    ]); ?>
   
    
    <?php endif; //echo $sql; ?>
</div>
</div>
</div>
    </div>