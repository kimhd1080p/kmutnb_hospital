<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'แก้ไขผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ผู้ป่วย', 'url' => ['patient/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
