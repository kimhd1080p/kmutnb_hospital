<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'เพิ่มผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ผู้ป่วย', 'url' => ['patient/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
