<?php

use yii\helpers\Html;
use kartik\grid\GridView;
 $session = Yii::$app->session;
 use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccidentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บันทึกอุบัติเหตุ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid'],'sid'=>$session['sid']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accident-index">

    <div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-download"></i>บันทึกอุบัติเหตุ</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
         //'panel'=>['before'=>"บันทึกอุบัติเหตุ คุณ".$session['pname']." ".$session['psurname']],
             'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"บันทึกอุบัติเหตุ คุณ".$session['pname']." ".$session['psurname'],'footer'=>false,'after'=>false,'before'=>false],
 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'timestam',
            'location',
         'inlocattype.inlocattype',
            'accidenttype.accidenttype',
            'medicaltreatment.medicaltreatment',
            'note',
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

