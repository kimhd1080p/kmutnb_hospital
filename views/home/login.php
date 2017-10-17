<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->registerCssFile("@web/css/login.css");
$this->title = 'Login';

?>
<div class="a1" >
<div class="login1">
   
  
 <div class="login-box-body">
        <p class="login-box-msg">กรุณาเข้าสู่ระบบ</p>
     <?php $form = ActiveForm::begin([
             'id' => 'login-form',
             'options' => ['method' => 'post']
         ]); ?>

        <?= $form->field($model, 'username', [
            "template"=>"<span class=\"glyphicon glyphicon-user form-control-feedback\"></span>\n{input}",
            'options'=>['class'=>'form-group has-feedback']])
            ->textInput(['placeholder'=>Yii::t('app', $model->getAttributeLabel('ชื่อผู้ใช้'))]);
        ?>

        <?= $form->field($model, 'password', [
            "template"=>"<span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>\n{input}",
            'options'=>['class'=>'form-group has-feedback']])
            ->passwordInput(['placeholder'=>Yii::t('app', $model->getAttributeLabel('รหัสผ่าน'))]);
        ?>


        
                 <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary btn-block btn-large', 'name' => 'login-button']) ?>
          

          <?php ActiveForm::end(); ?>
</div>

</div>
</div>