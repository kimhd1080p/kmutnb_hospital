<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'ดูผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ผู้ป่วย', 'url' => ['patient/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">

    

    <p>
        <?= Html::a('แก้ไข', ['update', 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'status_id' => $model->status_id, 'department_id' => $model->department_id, 'studentclass_id' => $model->studentclass_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'status_id' => $model->status_id, 'department_id' => $model->department_id, 'studentclass_id' => $model->studentclass_id], [
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
            'p_pid',
            'p_sid',
            'p_name',
            'p_surname',
            'sex',
            'p_birthday',
            'p_address',
            'p_tel',
            'p_allegy',
            'p_disease',
            'documentindex',
            'status.status',
            'department.department_name',
            'studentclass.studentclass',
        ],
    ]) ?>

</div>
