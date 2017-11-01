<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'เพิ่มพนักงาน';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'พนักงาน', 'url' => ['user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
