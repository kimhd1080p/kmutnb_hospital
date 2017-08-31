<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการนัดพบแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'งานเวชระเบียน', 'url' => ['medicalrecords/index']];
//$this->params['breadcrumbs'][] = ['label' => 'รายการนัดพบแพทย์', 'url' => ['medicalrecords/index2']];
$this->params['breadcrumbs'][] = $this->title;
$js = 'function refresh() {
     $.pjax.reload({container:"#appointment"});
     setTimeout(refresh, 5000); // restart the function every 5 seconds
 }
 refresh();';
 $this->registerJs($js, $this::POS_READY);
?>
<div class="appointment-index">


    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>
    <?php Pjax::begin(['id' => 'appointment']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"รายการนัดพบแพทย์"],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'patient_p_pid',
  'patient.p_name',
  'patient.p_surname',
            
          'casetype.casetype',
           //'detial:ntext',
            'appointment_time',
            //'medical_certificate',
            'patient.documentindex',
            //'todoctor',
            'doctor.doctortype.doctortype',
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
    //'label' => 'พบแพทย์แล้ว',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->todoctor === 1) {
            return '<i class="fa fa-check-square"></i>'; // "x" icon in red color
        } else {
            return '<i class="fa fa-times"></i>'; // check icon 
        }
    },
],
            //'doctor.doctor',
            
            
            
            //'timestam',
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
    <?php Pjax::end() ?>
</div>
