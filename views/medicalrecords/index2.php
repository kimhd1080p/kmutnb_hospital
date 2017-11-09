<?php


use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\growl\Growl;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการนัดพบแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'งานเวชระเบียน', 'url' => ['medicalrecords/index']];
//$this->params['breadcrumbs'][] = ['label' => 'รายการนัดพบแพทย์', 'url' => ['medicalrecords/index2']];
$this->params['breadcrumbs'][] = $this->title;
 $js = '
  setInterval(function () {
 $.pjax.reload({container: "#medicine", timeout: 10000});
}, 10000);   
';
 $this->registerJs($js, $this::POS_READY);
?>

<div class="appointment-index">

 <div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa   fa-th-list"></i>รายการนัด</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>
    <?php Pjax::begin(['id'=>'medicines']) ?>
    <?= GridView::widget([ 'id'=>'medicine',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
         'rowOptions'=>function ($model, $key, $index, $grid){if($model->todoctor === 0){ return ['class' => 'danger'];}else{return ['class' => 'success'];}},
        //'panel'=>['before'=>"รายการนัดพบแพทย์"],
 'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"รายการนัดพบแพทย์",'footer'=>false,'after'=>false,'before'=>false],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'patient_p_pid',
           
  'patient.p_name',
  'patient.p_surname',
            
          'casetypevalue',
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
            return '<i class="fa fa-check-square text-green"></i>'; // "x" icon in red color
        } else {
            return '<i class="fa fa-times text-red"></i>'; // check icon 
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
         </div>

 </div>

    </div>