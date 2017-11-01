<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Nursetype;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>ฟอร์ม</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'u_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
 <?= $form->field($model, 'mobilephone')->textInput(['maxlength' => true]) ?>

    
<?= $form->field($model, 'type')->dropDownList(
            ArrayHelper::map(Nursetype::find()->asArray()->all(), 'ut_id', 'type'),['prompt'=>'เลือก']
            ) ?>


<?= $form->field($model, 'status')->checkbox(['uncheck' => 0, 'value' => 10]) ?>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันบึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>