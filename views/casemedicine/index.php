<?php

use yii\helpers\Html;
use kartik\grid\GridView;
 $session = Yii::$app->session;
 use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CasemedicineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จ่ายยา คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid'],'sid'=>$session['sid']]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="casemedicine-index">
<div class="site-contact">

    <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa    fa-medkit"></i>จ่ายยา</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('จ่ายยา', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
         // 'panel'=>['before'=>"การจ่ายยา คุณ".$session['pname']." ".$session['psurname']],
             'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"การจ่ายยา คุณ".$session['pname']." ".$session['psurname'],'footer'=>false,'after'=>false,'before'=>false],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'casepatient.timestam',
            'casepatient.casetypevalue',
            'medicine.medicine',
            'qty',
            'medicinepackage.package',
           
          
            
             ['class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'print' => function ($url, $dataProvider, $key) {
                    return Html::a ( '<span class="fa fa-print" aria-hidden="true"></span> ', ['printmedicine', 'ID' => $dataProvider->ID, 'idcase' => $dataProvider->idcase, 'idmedicine' => $dataProvider->idmedicine,'medicinepackage_id' => $dataProvider->medicinepackage_id],
                            [                                 // link options
             'title'=>'ปริ้นซองยา' ,
             'target'=>'_blank'
           ]
                            );
                },
            ],
            'template' => Helper::filterActionColumn('{view} {update} {delete} {print}')


        ],
        
        ],
    ]); ?>
</div>
</div>
</div>
    </div>