<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */

$this->title = $model->idcase;
$this->params['breadcrumbs'][] = ['label' => 'Case Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idcase' => $model->idcase, 'casetype_idcasetype' => $model->casetype_idcasetype, 'idservices' => $model->idservices, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idcase' => $model->idcase, 'casetype_idcasetype' => $model->casetype_idcasetype, 'idservices' => $model->idservices, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'user_id' => $model->user_id], [
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
            'idcase',
            'case_detail',
            'timestam',
            'dispense',
            'casetype_idcasetype',
            'idservices',
            'iddoctor',
            'p_pid',
            'p_sid',
            'user_id',
        ],
    ]) ?>

</div>
