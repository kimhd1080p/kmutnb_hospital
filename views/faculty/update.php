<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */

$this->title = 'แก้ไขคณะ';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'คณะ', 'url' => ['faculty/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
