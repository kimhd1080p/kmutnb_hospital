<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicinetypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประเภทยา';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicinetype-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'panel'=>['before'=>"รายการประเภทยา"],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idmedicinetype',
            'medicinetype',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
