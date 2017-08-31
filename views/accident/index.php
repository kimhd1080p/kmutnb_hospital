<?php

use yii\helpers\Html;
use kartik\grid\GridView;
 $session = Yii::$app->session;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccidentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บันทึกอุบัติเหตุ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accident-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
         'panel'=>['before'=>"บันทึกอุบัติเหตุ คุณ".$session['pname']." ".$session['psurname']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'timestam',
            'location',
         'inlocattype.inlocattype',
            'accidenttype.accidenttype',
            'medicaltreatment.medicaltreatment',
            'note',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
