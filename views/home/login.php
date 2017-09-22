<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
?>
<div class="container" >
  <div id="page-wrapper">
			<br /><br /><br />
			<h1 class="text-center">ระบบสารสนเทศเพื่องานพยาบาล</h1>
                        <h3 class="text-center">มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h3><br />

        </div>
	<hr />
<div class="login-box">
    <div class="login-logo">
        
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">กรุณาเข้าสู่ระบบ</p>

         <?php $form = ActiveForm::begin([
             'id' => 'login-form',
             'options' => ['method' => 'post']
         ]); ?>

        <?= $form->field($model, 'username', [
            "template"=>"<span class=\"glyphicon glyphicon-user form-control-feedback\"></span>\n{input}",
            'options'=>['class'=>'form-group has-feedback']])
            ->textInput(['placeholder'=>Yii::t('app', $model->getAttributeLabel('username'))]);
        ?>

        <?= $form->field($model, 'password', [
            "template"=>"<span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>\n{input}",
            'options'=>['class'=>'form-group has-feedback']])
            ->passwordInput(['placeholder'=>Yii::t('app', $model->getAttributeLabel('password'))]);
        ?>


         <div class="row">
             <div class="col-xs-8">
                <a href="#"><?php //echo Yii::t('app', 'I forgot my password'); ?></a>
            </div><!-- /.col -->
             <div class="col-xs-4">
                 <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
             </div>
         </div>

          <?php ActiveForm::end(); ?>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div>