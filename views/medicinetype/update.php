<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicinetype */

$this->title = 'แก้ไขประเภทยา';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ประเภทยา', 'url' => ['medicinetype/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicinetype-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
