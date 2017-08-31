<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Doctor */

$this->title = 'เพิ่มแพทย์';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'แพทย์', 'url' => ['doctor/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
