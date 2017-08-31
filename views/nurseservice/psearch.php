<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'ค้นหาผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

 ?>
 
<!-- เรียก view _search.php -->
<div class="patient-search">

 

 <?= GridView::widget([
               
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'panel'=>['before'=>'ค้นหาพบ'],
     'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
         
                   'p_pid',
                    'p_sid',
         
         ['attribute'=>'p_name',
         'format'=>'raw',
         'value'=> function ($model){
     
     $pid=$model['p_pid'];
     $pname=$model['p_name'];
     return Html::a(Html::encode($pname),['pservice','pid'=>$pid]);
         }
       ,],
         
                   
                    'p_surname',
               'sex',
                    'status.status',
                  

                ],
                 ]);
                ?>
