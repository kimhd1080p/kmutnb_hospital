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
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'idcase' => $model->idcase, 'idmedicine' => $model->idmedicine, 'medicinepackage_id' => $model->medicinepackage_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'idcase' => $model->idcase, 'idmedicine' => $model->idmedicine, 'medicinepackage_id' => $model->medicinepackage_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
            'note',
            [  
           'label' => 'ผู้ให้บริการ',
        'value' => $model->casepatient->nurse->name.' '.$model->casepatient->nurse->nursetype->type ,
        ],
            'casepatient.doctor.doctor',
            ],
    ]) ?>

</div>
