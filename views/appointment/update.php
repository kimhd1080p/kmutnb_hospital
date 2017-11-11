<?php

use yii\helpers\Html;
$session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'แก้ไขการนัดพบแพทย์ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid'],'sid'=>$session['sid']]];
$this->params['breadcrumbs'][] = ['label' => 'นัดพบแพทย์', 'url' => ['appointment/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
