<?php
$this->registerCss("body { width: 80mm; height: 100mm; } table{text-align:center;} } ");
$this->registerCss("#barcode {font-weight: normal; font-style: normal; line-height:normal; sans-serif; font-size: 12pt}");
 $session = Yii::$app->session;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td width="30%" ><span style=" text-align: right;"><img src="<?php echo Yii::getAlias('@web').'/images/kmutnb_logo.png';?>" style="width:55pt;"></span></td>
    <td >มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ<br/><span style="font-size:12px; ">กทม. โทร 029122007 <br/>ปราจีนบุรี โทร 037217300 ต่อ 7035</span></td>
  </tr>
  <tr>
      <td colspan="2"><hr />วันที่ <?= date("Y-m-d H:i:s") ?></td>
   
  </tr>
  <tr>
      <td colspan="2">คุณ<?= $session['pname']." ".$session['psurname'] ?></td>
   
  </tr>
   <tr>
       <td colspan="2"><span style="font-weight:bold;"> <?= $model->medicine->medicine ?></span></td>
   
  </tr>
   <tr>
       <td colspan="2"><span>จำนวน <?= $model->qty ?> <?= $model->medicinepackage->package ?></span></td>
   
  </tr>
   
  <tr>
       <td colspan="2" style=" text-align: left;"><span style="font-size:14px; font-weight: bold;">สรรพคุณยา </span><span style="font-size:14px; "><?= $model->medicine->properties ?> </span></td>
   
  </tr>
  <tr>
      <td colspan="2" style=" text-align: left;"><span style="font-size:14px; font-weight: bold;">วิธีใช้/วิธีรับประทาน </span><span style="font-size:14px; "><?= $model->medicine->howto ?> </span></td>
   
  </tr>
  <tr>
       <td colspan="2" style=" text-align: left;"><span style="font-size:14px; font-weight: bold;">คำแนะนำ </span><span style="font-size:14px; "> <?= $model->medicine->note ?> </span></td>
   
  </tr>
  <tr>
      <td colspan="2" style=" text-align: left;"><br/><div id="barcode" ><?= $model->medicine->idmedicine ?></div> </td>
   
  </tr>
   
  
</table>


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
get_object("barcode").innerHTML=DrawHTMLBarcode_UPCA(get_object("barcode").innerHTML,"yes","in",0,2,0.4,"bottom","center","","black","white");       

setInterval(function(){ window.history.go(-2); }, 2000);
window.print();
 
   
EOT_JS
);
$this->registerJsFile(
    '@web/js/connectcode-javascript-upca.js'
);
?>
