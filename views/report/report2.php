<?php
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasepatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานการให้บริการ-นอกเวลาราชการ';
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
 <?php  echo $this->render('_search'); ?>
    
<?php if(isset($dataProvider1)&&isset($dataProvider2)&&isset($dataProvider3)&&isset($dataProvider4)):?>
 
 <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        //'panel'=>['before'=>"รายงานผู้ป่วย ".$dates." - ".$datee],
     'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"รายงานผู้ป่วย",'footer'=>false,'after'=>false,'before'=>false],
       
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        //'filterModel' => $searchModel,
        //'panel'=>['before'=>"รายงานอาการเจ็บป่วย ".$dates." - ".$datee],
             'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"รายงานอาการเจ็บป่วย",'footer'=>false,'after'=>false,'before'=>false],
       
    ]); ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider4,
        //'filterModel' => $searchModel,
        //'panel'=>['before'=>"รายงานอาการเจ็บป่วยพบแพทย์ ".$dates." - ".$datee],
           'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"รายงานอาการเจ็บป่วยพบแพทย์",'footer'=>false,'after'=>false,'before'=>false],
       
    ]); ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        //'filterModel' => $searchModel,
        //'panel'=>['before'=>"รายงานบริการที่ได้รับ ".$dates." - ".$datee],
           'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"รายงานบริการที่ได้รับ",'footer'=>false,'after'=>false,'before'=>false],
       
    ]); ?>
    
    <?php endif; ?>
</div>
</div>
</div>
    </div>