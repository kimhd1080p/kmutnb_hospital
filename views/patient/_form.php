<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Status;
use yii\helpers\ArrayHelper;
use app\models\Department;
use app\models\Studentclass;
/* @var $this yii\web\View */
/* @var $model app\models\Patient */
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

<div class="patient-form">
<div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>ฟอร์ม</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_pid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_sid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->dropdownList([
        'ชาย' => 'ชาย', 
       'หญิง' => 'หญิง'
    ],
    ['prompt'=>'เลือก']
); ?>

    <?= $form->field($model, 'p_birthday')->textInput(['id' => 'datepicker1']) ?>

    <?= $form->field($model, 'p_address')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_allegy')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_disease')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'documentindex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(
            ArrayHelper::map(Status::find()->asArray()->all(), 'status_id', 'status'),['prompt'=>'เลือก']
            ) ?>

    <?= $form->field($model, 'department_id')->dropDownList(
            ArrayHelper::map(Department::find()->asArray()->all(), 'iddepartment', 'department_name'),['prompt'=>'เลือก']
            ) ?>

    <?= $form->field($model, 'studentclass_id')->dropDownList(
            ArrayHelper::map(Studentclass::find()->asArray()->all(), 'studentclass_id', 'studentclass'),['prompt'=>'เลือก']
            ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
    </div>