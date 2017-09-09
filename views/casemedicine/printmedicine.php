<?php
$this->registerCss("body { width: 80mm; height: 100mm; } table{text-align:center;} }");
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
       <td colspan="2"><span style="font-weight:bold;">ชื่อยา <?= $model->medicine->medicine ?></span></td>
   
  </tr>
   <tr>
       <td colspan="2"><span>จำนวน <?= $model->qty ?> <?= $model->medicinepackage->package ?></span></td>
   
  </tr>
   <tr>
       <td colspan="2"><span style="font-weight:bold;">วันหมดอายุ <?= $model->expired_date ?><hr /> </span></td>
   
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
   
  
</table>

<?php
$this->registerJs( <<< EOT_JS
     
     // using GET method

setInterval(function(){ window.history.go(-2); }, 2000);
window.print();

EOT_JS
);
?>
