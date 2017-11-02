<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Medicine */
$this->registerCss("#barcode {font-weight: normal; font-style: normal; line-height:normal; sans-serif; font-size: 12pt}");
$this->title = 'ดูยา';
$this->params['breadcrumbs'][] = ['label' => 'เครื่องมือ', 'url' => ['//tool/index']];
$this->params['breadcrumbs'][] = ['label' => 'ยา', 'url' => ['medicine/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-view">

  
<div class="site-contact">
 <!-- Small boxes (Stat box) -->
   
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>รายละเอียด</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
    <p>
        <?= Html::a('แก้ไข', ['update', 'idmedicine' => $model->idmedicine, 'idmedicinetype' => $model->idmedicinetype], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'idmedicine' => $model->idmedicine, 'idmedicinetype' => $model->idmedicinetype], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณต้องการจะลบรายการนี้ ใช่หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
       
            'idmedicine',
           
            'medicine',
            'properties',
            'howto',
            'note',
                  'medicinetype.medicinetype',
        ],
    ]) ?>
 
</div>
</div>
 
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa  fa-file-text"></i>บาร์โค๊ด</li>
            </ul>
          <!-- เนื้อหา -->
          <div class="box-body">
<div id="barcode" ><?= $model->idmedicine ?></div> 

</div>
</div>
 
</div>
    </div>

<?php
$this->registerJs( <<< EOT_JS
     
     // using GET method
        
function get_object(id) {
   var object = null;
   if (document.layers) {
    object = document.layers[id];
   } else if (document.all) {
    object = document.all[id];
   } else if (document.getElementById) {
    object = document.getElementById(id);
   }
   return object;
  }
get_object("barcode").innerHTML=DrawHTMLBarcode_UPCA(get_object("barcode").innerHTML,"yes","in",0,2,0.8,"bottom","center","","black","white");       


 
   
EOT_JS
);
$this->registerJsFile(
    '@web/js/connectcode-javascript-upca.js'
);
?>