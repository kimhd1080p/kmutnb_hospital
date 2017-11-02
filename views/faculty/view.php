<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */

$this->title = 'ดูคณะ';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'คณะ', 'url' => ['faculty/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idfaculty], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idfaculty], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idfaculty',
            'faculty',
        ],
    ]) ?>

</div>
