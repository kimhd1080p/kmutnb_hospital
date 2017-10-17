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
 <?php  echo $this->render('_search2'); ?>
    
<?php if(isset($dataProvider1)&&isset($dataProvider2)&&isset($dataProvider3)):?>
 
 <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"สถานภาพ ".$dates." - ".$datee],
       
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
