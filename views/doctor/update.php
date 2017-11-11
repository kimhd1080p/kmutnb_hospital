<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */

$this->title = 'แก้ไขแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'แพทย์', 'url' => ['doctor/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-update">

 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
