<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */

$this->title = 'Create Case Patient';
$this->params['breadcrumbs'][] = ['label' => 'Case Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-patient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
