<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Medicinetype;
/* @var $this yii\web\View */
/* @var $model app\models\Medicine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicine-form">
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
        <?= $form->field($model, 'idmedicinetype')->textInput()
            ->dropDownList(
            ArrayHelper::map(Medicinetype::find()->asArray()->all(), 'idmedicinetype', 'medicinetype'),['prompt'=>'เลือก']
            ) ?>

    <?= $form->field($model, 'idmedicine')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'medicine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'properties')->textArea(['maxlength' => true])?>

    <?= $form->field($model, 'howto')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
    </div>