<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
$this->title = 'ดูภาควิชา/ส่วนงาน';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ภาควิชา/ส่วนงาน', 'url' => ['department/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iddepartment], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iddepartment], [
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
            'iddepartment',
            'department_name',
            'department_name2',
            'faculty.faculty',
        ],
    ]) ?>

</div>
