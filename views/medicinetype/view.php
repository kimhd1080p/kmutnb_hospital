<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicinetype */

$this->title = 'ดูประเภทยา';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ประเภทยา', 'url' => ['medicinetype/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicinetype-view">

 

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->idmedicinetype], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->idmedicinetype], [
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
            'idmedicinetype',
            'medicinetype',
        ],
    ]) ?>

</div>
