<?php

use yii\helpers\Html;
use kartik\grid\GridView;
 $session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'นัดพบแพทย์ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มการนัด', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"การนัดพบแพทย์ คุณ".$session['pname']." ".$session['psurname']],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          'casetypevalue',
           //'detial:ntext',
            'appointment_time',
           [
    'label' => 'ขอใบรับรองแพทย์',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->medical_certificate === 1) {
            return 'ใช่'; // "x" icon in red color
        } else {
            return 'ไม่ใช่'; // check icon 
        }
    },
],
            [
    'label' => 'พบแพทย์แล้ว',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->todoctor === 1) {
            return '<i class="fa fa-check-square"></i>'; // "x" icon in red color
        } else {
            return '<i class="fa fa-times"></i>'; // check icon 
        }
    },
],
            'timestam',
            // 'detial:ntext',
            // 'user_id',
            // 'user_id2',
            // 'patient_p_pid',
            // 'patient_p_sid',
            // 'casetype_idcasetype',
            // 'doctor_iddoctor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
