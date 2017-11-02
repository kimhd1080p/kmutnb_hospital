<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Faculty */

$this->title = 'เพิ่มคณะ';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'คณะ', 'url' => ['faculty/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
