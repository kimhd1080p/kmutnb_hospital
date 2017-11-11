<?php

use yii\helpers\Html;
//$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'แก้ไขการนัดพบแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'รายการนัดพบแพทย์', 'url' => ['medicalrecords/appointments']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-update">

    

    <?= $this->render('_form_1', [
        'model' => $model,
    ]) ?>

</div>
