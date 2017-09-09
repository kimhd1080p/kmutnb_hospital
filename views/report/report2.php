<?php
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasepatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานการให้บริการ-ในเวลาราชการ จ-ศ 16.01-21.00 ส-อา 8.00-16.30';
//$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
//$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
//$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="casepatient-index">
 <?php  echo $this->render('_search'); ?>
    
 <?php if(isset($dataProvider1)&&isset($dataProvider2)&&isset($dataProvider3)):?>
 
 <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายงานผู้ป่วย"],
       
    ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายงานอาการเจ็บป่วย"],
       
    ]); ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายงานบริการที่ได้รับ"],
       
    ]); ?>
    
    <?php endif; ?>
</div>
