<?php

use yii\helpers\Html;
use kartik\grid\GridView;
 $session = Yii::$app->session;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CasepatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประวัติ คุณ'.$session['pname']." ".$session['psurname'];
$this->params['breadcrumbs'][] = ['label' => 'งานพยาบาล', 'url' => ['nurseservice/index']];
$this->params['breadcrumbs'][] = ['label' => 'ค้นหาผู้ป่วย', 'url' => ['nurseservice/psearch']];
$this->params['breadcrumbs'][] = ['label' => 'บริการผู้ป่วย', 'url' => ['nurseservice/pservice','pid'=>$session['pid']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="casepatient-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 
    <p>
        <?= Html::a('บักทึกประวัติ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel'=>['before'=>"ประวัติ คุณ".$session['pname']." ".$session['psurname']],
        'columns' => [
            ['class' => 'yii\grid\Column'],
            'idcase',
          'casetypevalue',
            'case_detail',
            'timestam',
            //'dispense',
            //'idservices',
            // 'casetype_idcasetype',
            // 'iddoctor',
            // 'p_pid',
            // 'p_sid',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
