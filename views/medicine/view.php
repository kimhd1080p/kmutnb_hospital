<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */

$this->title = 'ดูยา';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ยา', 'url' => ['medicine/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-view">

 

    <p>
        <?= Html::a('Update', ['update', 'idmedicine' => $model->idmedicine, 'idmedicinetype' => $model->idmedicinetype], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idmedicine' => $model->idmedicine, 'idmedicinetype' => $model->idmedicinetype], [
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
            'idmedicine',
            'medicine',
            'medicinesize',
            'medicinetype.medicinetype',
            
        ],
    ]) ?>

</div>
