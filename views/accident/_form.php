<?php
$session = Yii::$app->session;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Accidenttype;
use app\models\Inlocattype;
use app\models\Medicaltreatment;
use app\models\Nurse;
/* @var $this yii\web\View */
/* @var $model app\models\Accident */
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


<div class="accident-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inlocattype_idinlocattype')->dropDownList(
            ArrayHelper::map(Inlocattype::find()->asArray()->all(), 'idinlocattype', 'inlocattype'),['prompt'=>'เลือก']
            ) ?>
    <?= $form->field($model, 'timestam')->textInput(['id' => 'default_datetimepicker']) ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 4]) ?>



    <?= $form->field($model, 'accidenttype_idaccidenttype')->dropDownList(
            ArrayHelper::map(Accidenttype::find()->asArray()->all(), 'idaccidenttype', 'accidenttype'),['prompt'=>'เลือก']
            ) ?>
    <?= $form->field($model, 'medicaltreatment_idmedicaltreatment')->dropDownList(
            ArrayHelper::map(Medicaltreatment::find()->asArray()->all(), 'idmedicaltreatment', 'medicaltreatment'),['prompt'=>'เลือก']
            ) ?>

    <?= $form->field($model, 'p_pid')->hiddenInput(['maxlength' => true,'value' => $session['pid'],])->label(false);  ?>

    <?= $form->field($model, 'p_sid')->hiddenInput(['maxlength' => true,'value' => $session['sid'],])->label(false);  ?>

   <?= $form->field($model, 'nurse_id')->dropDownList(
            ArrayHelper::map(Nurse::find()->where(['usertype_ut_id' => 1,'n_status' => 1])->asArray()->all(), 'id', 'name'),['prompt'=>'เลือก']
            ) ?>

        <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
