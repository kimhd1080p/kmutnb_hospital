<?php
$session = Yii::$app->session;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Casepatient */

$this->title = 'แก้ไขประวัติ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
$this->params['breadcrumbs'][] = ['label' => 'ประวัติ', 'url' => ['casepatient/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casepatient-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
