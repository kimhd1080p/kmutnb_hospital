<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */

$this->title = 'บันทึกประวัติ';
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['patientsearch']];
$this->params['breadcrumbs'][] = $this->title;

?>


<h2 class="text-center"><?= "คุณ".$name. " " .$surname; ?></h2>
    

    <?= $this->render('_form', [
        'model' => $model,'pid' => $pid  ,'sid'=>$sid,
    ]) ?>


