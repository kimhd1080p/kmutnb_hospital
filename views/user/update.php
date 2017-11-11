<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'แก้ไขพนักงาน';
$this->params['breadcrumbs'][] = ['label' => 'จัดการ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'พนักงาน', 'url' => ['user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-update">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
