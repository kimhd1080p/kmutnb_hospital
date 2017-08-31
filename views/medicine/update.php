<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = 'แก้ไขยา';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ยา', 'url' => ['medicine/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
