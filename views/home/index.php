


<?php
use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

//use app\controllers\NurseserviceController; 

//echo NurseserviceController::actionIndex(); 
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */




  //if(empty($session['userid'])){
  //  return $this->render('login');}
//$id=Yii::$app->user->id;
//echo $id;pri
//print_r ($session['userid']);


/* @var $this yii\web\View */
//echo Yii::$app->user->isGuest;
//print_r (@Yii::$app->user->identity->u_name);


$this->registerJsFile(
    '@web/js/jquery.js'
);
$this->registerJsFile(
    '@web/js/jquery.datetimepicker.full.js'
);

$this->registerJsFile(
    '@web/js/jsdtp.js'
);

//print_r (Yii::$app->user);
//echo Url::to(['patientsearch']);
 //echo Yii::$app->NurseserviceController->action->id;
//echo date("Y-m-d H:i:s");
//echo Url::to(['home/logout']);
$this->title = 'ระบบสารสนเทศเพื่องานพยาบาล มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ';

?>

<div class="site-home">
 <div id="page-wrapper">
     <br /><br />
<!--			<br /><br /><br />
                 		<h2 class="text-center">ระบบสารสนเทศเพื่องานพยาบาล มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</h2><br />
<div class="text-center"><img src="images/kmutnb_logo1.png" width="300"></div>-->
       
        <!-- /#page-wrapper -->
<?php
function ThDate()
{
//วันภาษาไทย
$ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
//เดือนภาษาไทย
$ThMonth = array ( "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
 
//กำหนดคุณสมบัติ
$week = date( "w" ); // ค่าวันในสัปดาห์ (0-6)
$months = date( "m" )-1; // ค่าเดือน (1-12)
$day = date( "d" ); // ค่าวันที่(1-31)
$years = date( "Y" ); // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.
 
return "เดือน$ThMonth[$months]  $years";
}

foreach ($dataProvider1->models as $key => $value)
{
    $item = [
            [
                //'type' => 'column',
                'name' => 'นักศึกษา',
                //'data' => [intval($value['นักศึกษา'])],
                'y' => intval($value['นักศึกษา']),
                'color' => new JsExpression('Highcharts.getOptions().colors[0]'),
            ],
            [
                //'type' => 'column',
                'name' => 'อาจารย์',
                //'data' => [intval($value['อาจารย์'])],
                  'y' => intval($value['อาจารย์']),
                'color' => new JsExpression('Highcharts.getOptions().colors[1]'),
            ],
            [
                //'type' => 'column',
                'name' => 'เจ้าหน้าที่',
                //'data' => [intval($value['เจ้าหน้าที่'])],
                  'y' => intval($value['เจ้าหน้าที่']),
                'color' => new JsExpression('Highcharts.getOptions().colors[2]'),
            ],
         [
               // 'type' => 'column',
                'name' => 'อื่นๆ',
               // 'data' => [intval($value['อื่นๆ'])],
               'y' => intval($value['อื่นๆ']),
                'color' => new JsExpression('Highcharts.getOptions().colors[3]'),
            ],
            
            
        ];
    //print_r($value);
   // echo $value->name;
   //echo $key[1][0];
    //echo $value['นักศึกษา'];
    //echo mysql_field_name($months[0]['นักศึกษา'], 0);
   //print_r($key);
}
// print_r($dataProvider1);

echo Highcharts::widget([
  'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
//    'options' => [
////        'title' => [
////            'text' => 'จำนวนผู้เข้าใช้บริการในเดือน'.ThDate(),
////        ],
////        'xAxis' => [
////            'categories' => ['ผู้มาใช้บริการ'],
////      
////        ],
////        'yAxis' => [
////            
////            'title' => [
////            'text' => 'จำนวนคน',
////        ],
////        ],
////     
////        'series' => $item,
//        
//    ]
     'options' => [
        'title' => [
            'text' => 'ปริมาณผู้เข้าใช้บริการใน'.ThDate(),
        ],


        'series' => [
            
            
            [
                'type' => 'pie',
                'name' => 'จำนวน',
                'data' => $item,
                //'center' => [300, 100],
                //'size' => 100,
                'showInLegend' => true,
                'dataLabels' => [
                    'enabled' => TRUE,
                    'format' => '<b>{point.name}</b> {point.y}  คน',
                ],
            ],
        ],
    ]
]);
?>
 </div>
    </div> 


