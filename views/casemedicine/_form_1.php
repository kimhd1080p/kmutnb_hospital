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

<div class="medicine-search">

    
    
      <?= Html::activeTextInput($model, 'medicinesearch',['class'=>'form-control','placeholder'=>'ใส่รหัสยา','id'=>'medicinesearch']) ?>
      <br/>
   
  

</div>

<div class="casemedicine-form">
    
    

    <?php $form = ActiveForm::begin(); ?>

    <?php //$sql = 'SELECT * FROM casepatient WHERE DATE(timestam) = CURDATE() and p_pid='.$session['pid'];
$sql = 'SELECT * FROM casepatient WHERE p_pid='.$session['pid'].' and DATE(timestam) = "'.date("Y-m-d").'"  order by time(timestam) desc';
?>
    <?= $form->field($model, 'idcase') ->dropDownList(
            ArrayHelper::map(Casepatient::findBySql($sql)->all(), 'idcase', 'casetypevalue','timestam')
            ) ?>
<?= $form->field($model, 'medicinename')->textInput(['maxlength' => true,'id' => 'medicinename','disabled'=>'disabled']) ?>
     <?= $form->field($model, 'idmedicine') ->hiddenInput(['maxlength' => true,'id' => 'idmedicine',])->label(false); ?>
     <?php $model->qty=6;
     $model->medicinepackage_id=1;
     ?>
 <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'medicinepackage_id')->radioList(
            ArrayHelper::map(Medicinepackage::find()->asArray()->all(), 'id', 'package'),['prompt'=>'เลือกยา']
            )  ?>
  

   <?= $form->field($model, 'expired_date')->textInput(['id' => 'default_datetimepicker'])

 ?>

    <?= $form->field($model, 'properties')->textInput(['maxlength' => true,'id' =>'properties']) ?>

    <?= $form->field($model, 'howto')->textInput(['maxlength' => true,'id' =>'howto']) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true,'id' =>'note']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$this->registerJs( <<< EOT_JS
     
     // using GET method
$('#medicinesearch').change(function(){
    
    var medicine=$(this).val();
   
    var url1=window.location.host+'/project/web';
    var url2='http://'+url1+'/casemedicine/getmedicine';
      
         //alert(url2);
    $.get(url2,{medicine : medicine },function(data){
        var data = $.parseJSON(data);
           $('#properties').attr('value',data.properties);
    $('#properties').attr('value',data.properties);
        $('#howto').attr('value',data.howto);
        $('#note').attr('value',data.note);
        $('#idmedicine').attr('value',data.idmedicine);
         $('#medicinename').attr('value',data.medicine);

    });

});

EOT_JS
);
?>