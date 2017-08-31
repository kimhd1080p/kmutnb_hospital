<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nurse */

$this->title = 'แก้ไขพนักงาน';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'พนักงาน', 'url' => ['nurse/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nurse-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
