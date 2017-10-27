<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Medicinetype;
/* @var $this yii\web\View */
/* @var $model app\models\AppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(
    '@web/js/jquery.js'
);
$this->registerJsFile(
    '@web/js/jquery.datetimepicker.full.js'
);

$this->registerJsFile(
    '@web/js/jsdtp.js'
);
?>

<div class="appointment-search">

    <?php $form = ActiveForm::begin([
       
        'method' => 'post'
    ]); ?>
<div class="form-group">
    <label for="type">ประเภทยา </label>
     <?= Html::dropDownList('type','',
            ArrayHelper::map(Medicinetype::find()->asArray()->all(), 'idmedicinetype', 'medicinetype'),['prompt'=>'เลือก',]
            ) ?>

    <label for="startdate">จากวันที่</label>
   <?= Html::textInput('startdate','',['id' => 'startdate']) ?>
    <label for="enddate">ถึงวันที่</label>
     <?= Html::textInput('enddate','',['id' => 'enddate']) ?>
     
     <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
</div>
      <div class="form-group">
       
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
      </div>

    <?php ActiveForm::end(); ?>

</div>
