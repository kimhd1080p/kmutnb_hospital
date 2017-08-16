<?php
$session = Yii::$app->session;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Casetype;
use app\models\Services;
use app\models\Doctor;
/* @var $this yii\web\View */
/* @var $model app\models\CasePatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="case-patient-form">

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'p_pid')->hiddenInput(['maxlength' => true,'value' => $pid,])->label(false); ?>

    <?= $form->field($model, 'p_sid')->hiddenInput(['maxlength' => true,'value' => $sid,])->label(false); ?>

<?= $form->field($model, 'casetype_idcasetype')
     ->dropDownList(
            ArrayHelper::map(Casetype::find()->asArray()->all(), 'idcasetype', 'casetype'),['prompt'=>'เลือกประเภทอาการ']
            ) ?>
       

    <?= $form->field($model, 'case_detail')->textArea(['maxlength' => true]) ?>

<?= $form->field($model, 'idservices')->dropDownList(
            ArrayHelper::map(Services::find()->asArray()->all(), 'idservices', 'services'),['prompt'=>'เลือกประเภทอาการ']
            ) ?>

 <?= $form->field($model, 'iddoctor')->dropDownList(
            ArrayHelper::map(Doctor::find()->asArray()->all(), 'iddoctor', 'doctor'),['prompt'=>'เลือก']
            ) ?>
<br />
    <?php $model->dispense = 0; ?>
<?= $form->field($model, 'dispense')->checkbox(); ?>


    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->id])->label(false); ?>
<br />
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บักทึกข้อมูล' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
