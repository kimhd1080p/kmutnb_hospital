<?php
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasepatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานอุบัติเหตุ นอกเวลาราชการ';
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
 <?php  echo $this->render('_search2'); ?>
   <?php $pdfHeader = [
  'L' => [
    'content' => 'ห้องพยาบาล มจพ.',
  ],
  'C' => [
    'content' => '',
    'font-size' => 10,
    'font-style' => 'B',
    'font-family' => 'arial',
    'color' => '#333333'
  ],
  'R' => [
    'content' => $this->title." วันที่ ".$dates." - ".$datee,
  ],
  'line' => true,
];

?>
   <?php if(isset($dataProvider1)&&isset($dataProvider2)&&isset($dataProvider3)):?>
 
 <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"สถานภาพ ".$dates." - ".$datee],
      'responsive'=>true,
             'hover'=>true,
             'exportConfig' => [
                   GridView::CSV => ['label' => 'Export as CSV', 'filename' => "สถานภาพ ".$dates." - ".$datee],
                   GridView::HTML => ['label' => 'Export as HTML', 'filename' => "สถานภาพ ".$dates." - ".$datee],
                   GridView::PDF => ['label' => 'Export as PDF', 'filename' => "สถานภาพ ".$dates." - ".$datee, 'config' =>[ 'methods' => [
                       'SetHeader' => [['odd' => $pdfHeader, 'even' => $pdfHeader]],
          'SetFooter' => [['odd' => $pdfHeader, 'even' => $pdfHeader]]
         ],],],
                   GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => "สถานภาพ ".$dates." - ".$datee],
                   GridView::TEXT=> ['label' => 'Export as TEXT', 'filename' => "สถานภาพ ".$dates." - ".$datee],
                ],
                'export' => [
                   'fontAwesome' => true
                ],  
    
       
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"ลักษณะการบาดเจ็บ ".$dates." - ".$datee],
       
    ]); ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"การรักษาพยาบาล ".$dates." - ".$datee],
       
    ]); ?>
     <?php endif; ?>
</div>
</div>
</div>
    </div>