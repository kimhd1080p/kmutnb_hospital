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

    <?php $form = ActiveForm::begin([
        'action' => [''],
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'p_pid') ?>

    <?php // $form->field($model, 'p_sid') ?>

    <?php //$form->field($model, 'p_name') ?>

    <?php //$form->field($model, 'p_surname') ?>

    <?php //$form->field($model, 'p_birthday') ?>

    <?php // echo $form->field($model, 'p_address') ?>

    <?php // echo $form->field($model, 'p_tel') ?>

    <?php // echo $form->field($model, 'p_allegy') ?>

    <?php // echo $form->field($model, 'p_disease') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <?php // echo $form->field($model, 'studentclass_id') ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
   
    </div>

    <?php ActiveForm::end(); ?>

</div>

 
<?= GridView::widget([
                'id'=>'grid-user',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => [
                  'class' => 'table table-bordered  table-striped table-hover',
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'p_pid',
                    'p_sid',
                    'p_name',
                    'p_surname',
                    'status.status',
                  [
       'class' => 'yii\grid\ActionColumn',
        'template' => '{savehistory}',
        'buttons' => [
            
                'savehistory' => function ($url,$model,$key) {
                                return Html::a('เลือก', $url);
                },
        ],
],
                ],
            ]);

               
                ?>

 <?= GridView::widget([
               
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'panel'=>['before'=>'ค้นหาพบ'],
     'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
         ['attribute'=>'p_pid',
         'format'=>'raw',
         'value'=> function ($model){
     
     $pid=$model['p_pid'];
     $pname=$model['p_name'];
     return Html::a(Html::encode($pid),['pservice','pid'=>$pid]);
         }
       ,],
                  
                    'p_sid',
                    'p_name',
                    'p_surname',
                    'status.status',
                  

                ],
                 ]);
                ?>
