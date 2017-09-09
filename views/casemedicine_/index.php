<?php

use yii\helpers\Html;
use kartik\grid\GridView;
 $session = Yii::$app->session;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasemedicineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จ่ายยา คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casemedicine-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('จ่ายยา', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
          'panel'=>['before'=>"การจ่ายยา คุณ".$session['pname']." ".$session['psurname']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'casepatient.timestam',
            'casepatient.casetype.casetype',
            'medicine.medicine',
            'qty',
            'medicinepackage.package',
           
          
            ['class' => 'yii\grid\ActionColumn'],
        
        ],
    ]); ?>
</div>
