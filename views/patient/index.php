<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มผู้ป่วย', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'panel'=>['before'=>"รายการผู้ป่วย"],
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'p_pid',
            'p_sid',
            'p_name',
            'p_surname',
            'sex',
            // 'p_birthday',
            // 'p_address',
            // 'p_tel',
            // 'p_allegy',
            // 'p_disease',
            // 'documentindex',
            // 'status_id',
            // 'department_id',
            // 'studentclass_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
