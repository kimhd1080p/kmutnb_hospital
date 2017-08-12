<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


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
            ]); ?>

