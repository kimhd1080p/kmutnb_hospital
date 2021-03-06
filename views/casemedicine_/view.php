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
            'casepatient.casetype.casetype',
            'casepatient.case_detail',
             'casepatient.services.services',
            'medicine.medicine',
            'qty',
            'medicinepackage.package',
            'expired_date',
              [
    'label' => 'วิธีใช้',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->take1 === 1) {
            return 'รับประทาน'; // "x" icon in red color
        } else if ($model->take1 === 2) {
            return 'อม'; // check icon 
        }else if ($model->take1 === 3) {
            return 'เคี้ยว'; // check icon 
        }else  {
            return 'ไม่ทราบ'; // check icon 
        }
    },
],
            'take2',
            'take3',
            [
    'label' => 'ก่อนหรือหลัง',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->take1 === 1) {
            return 'ก่อนอาหาร'; // "x" icon in red color
        } else if ($model->take1 === 2) {
            return 'หลังอาหาร'; // check icon 
        
        }else  {
            return 'ไม่ทราบ'; // check icon 
        }
    },
],
            'take5value',
            'take6',
            'take7',
            'take8value',
            
            [  
           'label' => 'ผู้ให้บริการ',
        'value' => $model->casepatient->nurse->name.' '.$model->casepatient->nurse->nursetype->type ,
        ],
            'casepatient.doctor.doctor',
            ],
    ]) ?>

</div>
