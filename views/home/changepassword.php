<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'เปลี่ยนรหัสผ่าน';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-changepassword">
  
    
   
    
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model,'oldpass',['inputOptions'=>[
            'placeholder'=>'รหัสผ่านเดิม'
        ]])->passwordInput() ?>
        
        <?= $form->field($model,'newpass',['inputOptions'=>[
            'placeholder'=>'รหัสผ่านใหม่'
        ]])->passwordInput() ?>
        
        <?= $form->field($model,'repeatnewpass',['inputOptions'=>[
            'placeholder'=>'ยืนยันรหัสผ่านใหม่'
        ]])->passwordInput() ?>
        
        <div class="form-group">
            
                <?= Html::submitButton('เปลี่ยนรหัสผ่าน',[
                    'class'=>'btn btn-primary'
                ]) ?>
        
        </div>
    <?php ActiveForm::end(); ?>
</div>