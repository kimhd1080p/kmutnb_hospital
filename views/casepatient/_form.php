<?php
$session = Yii::$app->session;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Casetype;
use app\models\Services;
use app\models\Doctor;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="case-patient-form">
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
      <?= $form->field($model, 'p_pid')->hiddenInput(['maxlength' => true,'value' => $session['pid'],])->label(false); ?>

    <?= $form->field($model, 'p_sid')->hiddenInput(['maxlength' => true,'value' => $session['sid'],])->label(false); ?>

<?= $form->field($model, 'casetype_idcasetype')
     ->checkboxList(
            ArrayHelper::map(Casetype::find()->all(), 'idcasetype', 'casetype'),['prompt'=>'เลือกประเภทอาการ']
            ) ?>
       

    <?= $form->field($model, 'case_detail')->textArea(['maxlength' => true]) ?>

<?= $form->field($model, 'idservices')->checkboxList(
            ArrayHelper::map(Services::find()->all(), 'idservices', 'services'),['prompt'=>'เลือกประเภทอาการ']
            ) ?>

 <?= $form->field($model, 'iddoctor')->dropDownList(
            ArrayHelper::map(Doctor::find()->where(['d_status' => 1])->asArray()->all(), 'iddoctor', 'doctor'),['prompt'=>'เลือก']
            ) ?>
<br />
    <?php //$model->dispense = 0; ?>
<?php //$form->field($model, 'dispense')->checkbox(); ?>

   <?= $form->field($model, 'nurse_id')->dropDownList(
            ArrayHelper::map(User::find()->where(['type' => 2,'status' => 10])->asArray()->all(), 'id', 'u_name'),['prompt'=>'เลือก']
            ) ?>
<br />
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บักทึกข้อมูล' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 </div>
           
          </div>
</div>
</div>