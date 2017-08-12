<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */

$this->title = 'บันทึกประวัติ';
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['patientsearch']];
$this->params['breadcrumbs'][] = $this->title;
 $patient1=$modelpat::findOne(["p_pid"=>$_GET['p_pid']]);
?>


<h2 class="text-center"><?= "คุณ".$patient1->p_name. " " .$patient1->p_surname; ?></h2>
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


