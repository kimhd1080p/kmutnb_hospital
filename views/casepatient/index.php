<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CasePatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Case Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Case Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcase',
            'case_detail',
            'timestam',
            'dispense',
            'casetype_idcasetype',
            // 'idservices',
            // 'iddoctor',
            // 'p_pid',
            // 'p_sid',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
