<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'พนักงาน';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'panel'=>['before'=>"รายการ"],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            'username',
              'u_name',
            'nursetype.type',
              
             'email:email',
       
            // 'created_at',
            // 'updated_at',
        
             'mobilephone',
             [
    'label' => 'สถานะ',
    'format' => 'raw',
    'value' => function ($model) {
        if ($model->status === 10) {
            return 'ใช้งาน'; // "x" icon in red color
        } else {
            return 'ไม่ใช้งาน'; // check icon 
        }
    },
],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
