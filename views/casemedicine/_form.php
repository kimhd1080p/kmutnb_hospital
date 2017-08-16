<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Casepatient;
use app\models\Medicine;
use app\models\Medicinepackage;
$session = Yii::$app->session;

/* @var $this yii\web\View */
/* @var $model app\models\Casemedicine */
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

<div class="casemedicine-form">

      <?php $form = ActiveForm::begin(); ?>
<?php //$sql = 'SELECT * FROM casepatient WHERE DATE(timestam) = CURDATE() and p_pid='.$session['pid'];
$sql = 'SELECT * FROM casepatient WHERE p_pid='.$session['pid'];
?>
    <?= $form->field($model, 'idcase') ->dropDownList(
            ArrayHelper::map(Casepatient::findBySql($sql)->asArray()->all(), 'idcase', 'case_detail','timestam'),['prompt'=>'เลือก']
            ) ?>
    
    <?= $form->field($model, 'idmedicine') ->dropDownList(
            ArrayHelper::map(Medicine::find()->joinWith('medicinetype')->asArray()->all(), 'idmedicine', 'medicine','medicinetype.medicinetype'),['prompt'=>'เลือกยา']
            )  ?>
    
  <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'medicinepackage_id')->radioList(
            ArrayHelper::map(Medicinepackage::find()->asArray()->all(), 'id', 'package'),['prompt'=>'เลือกยา']
            )  ?>
 <?= $form->field($model, 'expired_date')->textInput(['id' => 'datetimepicker_mask'])

 ?>
   

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
