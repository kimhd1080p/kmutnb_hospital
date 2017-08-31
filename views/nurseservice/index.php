 
<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'งานพยาบาล';
$this->params['breadcrumbs'][''] = $this->title;

?>

<div class="site-contact">
 <!-- Small boxes (Stat box) -->
      <div class="row">
          
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>บริการ</h3>

              <p>ผู้ป่วย</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?=Url::to(['nurseservice/psearch'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
          
           <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>รายการนัด</h3>

              <p>นัดพบแพทย์ล่วงหน้า</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?=Url::to(['//medicalrecords/appointments'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
          
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
       </div>