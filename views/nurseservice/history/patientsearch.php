<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'ค้นหาผู้ป่วย';
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

 ?>
 
<!-- เรียก view _search.php -->
<?php echo $this->render('_search', ['model' => $model]); ?>


<?= GridView::widget([
                'id'=>'grid-user',
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
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
                'panel'=>['before'=>'ค้นหาพบ'],
     'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
         ['attribute'=>'p_pid',
         'format'=>'raw',
         'value'=> function ($model){
     
     $pid=$model['p_pid'];
     $pname=$model['p_name'];
     return Html::a(Html::encode($pid),['savehistory','pid'=>$pid,'id'=>$pid]);
         }
       ,],
                  
                    'p_sid',
                    'p_name',
                    'p_surname',
                    'status.status',
                  

                ],
                 ]);
                ?>