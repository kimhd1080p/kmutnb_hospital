<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use app\models\Medicinetype;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CasepatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานการจ่ายยา ในเวลาราชการ';
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
              <li class="pull-left header"><i class="fa  fa-file-text"></i>รายงาน  <?=@$dates." - ".@$datee?></li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
 <?php  echo $this->render('_search3'); ?>

   <?php if(isset($dataProvider1)):?>
    <?php
    $pdfHeader = [
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
$name_m = Medicinetype::findOne($type);
$name_m->medicinetype;
?>
 <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"รายการยาหมวด ".$name_m->medicinetype,'footer'=>false,'after'=>false,'before'=>false],
      'responsive'=>true,
             'hover'=>true,
    'exportConfig' => [
                   GridView::CSV => ['label' => 'Export as CSV', 'filename' => "รายงานการจ่ายยา ".$dates." - ".$datee],
                   GridView::HTML => ['label' => 'Export as HTML', 'filename' => "รายงานการจ่ายยา ".$dates." - ".$datee],
                   GridView::PDF => ['label' => 'Export as PDF', 'filename' => "รายงานการจ่ายยา ".$dates." - ".$datee, 'config' =>[ 'methods' => [
                       'SetHeader' => [['odd' => $pdfHeader, 'even' => $pdfHeader]],
          'SetFooter' => [['odd' => $pdfHeader, 'even' => $pdfHeader]]
         ],],],
                   GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => "รายงานการจ่ายยา ".$dates." - ".$datee],
                   GridView::TEXT=> ['label' => 'Export as TEXT', 'filename' => "รายงานการจ่ายยา ".$dates." - ".$datee],
                ],
//                'export' => [
//                   'fontAwesome' => true
//                ],  
    
       
    ]); ?>
            
     <?php endif; ?>
</div>
</div>
</div>
    </div>