
<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'จัดการ';
$this->params['breadcrumbs'][''] = $this->title;

?>

<div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-th-list"></i>รายการ</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
          <div class="row">
          
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>ผู้ป่วย</h3>

              <p>เพิ่ม ลบ แก้ไข</p>
            </div>
            <div class="icon">
              <i class="fa fa-wheelchair"></i>
            </div>
            <a href="<?=Url::to(['//patient/index'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
          
           <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>พนักงาน</h3>

              <p>เพิ่ม ลบ แก้ไข พยาบาล เวชระเบียน</p>
            </div>
            <div class="icon">
              <i class="fa  fa-user"></i>
            </div>
            <a href="<?=Url::to(['//user/index'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
              
              <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>ภาควิชา</h3>

              <p>เพิ่ม ลบ แก้ไข ภาควิชา/ส่วนงาน</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['//department/index'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
              
              <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>คณะ</h3>

              <p>เพิ่ม ลบ แก้ไข คณะ</p>
            </div>
            <div class="icon">
              <i class="fa  fa-gears"></i>
            </div>
            <a href="<?=Url::to(['//faculty/index'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
              
<!--              <div class="col-lg-3 col-xs-6">
           small box 
          <div class="small-box bg-green">
            <div class="inner">
              <h3>กำหนดสิทธิ์</h3>

              <p>กำหนดสิทธิ์การใช้งานในระบบ</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=Url::to(['//admin'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>-->
          
           <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>แพทย์</h3>

              <p>เพิ่ม ลบ แก้ไข</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="<?=Url::to(['//doctor/index'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

          
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>พิมพ์สติ๊กเกอร์ยา</h3>

              <p>พิมพ์สติ๊กเกอร์ยา หลายจำนวน</p>
            </div>
            <div class="icon">
              <i class="fa  fa-print"></i>
            </div>
            <a href="<?=Url::to(['//casemedicine/printsonga'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
              
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>ยา</h3>

              <p>เพิ่ม ลบ แก้ไข</p>
            </div>
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <a href="<?=Url::to(['//medicine/index'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
          
           <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>ประเภทยา</h3>

              <p>เพิ่ม ลบ แก้ไข</p>
            </div>
            <div class="icon">
                  <i class="fa fa-cart-plus"></i>
            </div>
            <a href="<?=Url::to(['//medicinetype/index'])?>" class="small-box-footer">
              ดำเนินการ <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
          
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
       </div>
           </div>
          </div>