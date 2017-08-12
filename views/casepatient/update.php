<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */

$this->title = 'Update Case Patient: ' . $model->idcase;
$this->params['breadcrumbs'][] = ['label' => 'Case Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcase, 'url' => ['view', 'idcase' => $model->idcase, 'casetype_idcasetype' => $model->casetype_idcasetype, 'idservices' => $model->idservices, 'iddoctor' => $model->iddoctor, 'p_pid' => $model->p_pid, 'p_sid' => $model->p_sid, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="case-patient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
