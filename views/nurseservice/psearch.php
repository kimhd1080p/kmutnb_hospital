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

    <div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>ค้นหา</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
              
   <?php $form = ActiveForm::begin([
        'action' => ['psearch'],
        'method' => 'get',
    ]); ?>

   <?php echo $form->field($model, 'ps')->textInput(['id' => 'ps'])->label('ค้นหาผู้ป่วย') ?>



    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
</div>
</div>
    
    <?php if(isset($dataProvider)): ?>
 <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
               // 'panel'=>['before'=>'ค้นหาพบ'],
             'panel'=>['type' => GridView::TYPE_PRIMARY,'heading'=>"ค้นหาพบ",'footer'=>false,'after'=>false,'before'=>false],

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
 <?php endif; ?>
</div>