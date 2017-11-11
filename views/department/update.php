<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'แก้ไขภาควิชา/ส่วนงาน';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ภาควิชา/ส่วนงาน', 'url' => ['department/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
