<?php
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasepatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานการให้บริการ-ในเวลาราชการ จันทร์-ศุกร์ 08.30-16.00';
//$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
//$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
//$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="casepatient-index">
 <?php  echo $this->render('_search'); ?>
    
 <?php if(isset($dataProvider1)&&isset($dataProvider2)&&isset($dataProvider3)&&isset($dataProvider4)):?>
 
 <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายงานผู้ป่วย ".$dates." - ".$datee],
       
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายงานอาการเจ็บป่วย ".$dates." - ".$datee],
       
    ]); ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider4,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายงานอาการเจ็บป่วยพบแพทย์ ".$dates." - ".$datee],
       
    ]); ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายงานบริการที่ได้รับ ".$dates." - ".$datee],
       
    ]); ?>
    
    <?php endif; ?>
</div>
