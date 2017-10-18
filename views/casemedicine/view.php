<?php

use yii\helpers\Html;

use yii\widgets\DetailView;
$session = Yii::$app->session;

/* @var $this yii\web\View */
/* @var $model app\models\Casemedicine */

$this->title = 'ดูการจ่ายยา คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
$this->params['breadcrumbs'][] = ['label' => 'จ่ายยา', 'url' => ['casemedicine/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casemedicine-view">

 
<div class="case-patient-form">
<div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>ฟอร์ม</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <p>
        <?= Html::a('แก้ไข', ['update', 'ID' => $model->ID, 'idcase' => $model->idcase, 'idmedicine' => $model->idmedicine, 'medicinepackage_id' => $model->medicinepackage_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'ID' => $model->ID, 'idcase' => $model->idcase, 'idmedicine' => $model->idmedicine, 'medicinepackage_id' => $model->medicinepackage_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณต้องการจะลบรายการนี้ ใช่หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
             'ID',
            'casepatient.timestam',
            'casepatient.casetypevalue',
            'casepatient.case_detail',
             'casepatient.servicesvalue',
            'medicine.medicine',
            'qty',
            'medicinepackage.package',
            'expired_date',
            'properties',
            'howto',
            'note',
        ],
    ]) ?>

</div>
</div>
</div>
    </div>