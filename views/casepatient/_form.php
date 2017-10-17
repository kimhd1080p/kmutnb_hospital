<?php
$session = Yii::$app->session;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Casetype;
use app\models\Services;
use app\models\Doctor;
use app\models\Nurse;
/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="case-patient-form">

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
            ArrayHelper::map(Doctor::find()->where(['d_status' => 1])->asArray()->all(), 'iddoctor', 'doctor')
            ) ?>
<br />
    <?php //$model->dispense = 0; ?>
<?php //$form->field($model, 'dispense')->checkbox(); ?>


    <?= $form->field($model, 'nurse_id')->dropDownList(
            ArrayHelper::map(Nurse::find()->where(['usertype_ut_id' => 1,'n_status' => 1])->asArray()->all(), 'id', 'name'),['prompt'=>'เลือก']
            ) ?>
<br />
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บักทึกข้อมูล' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
