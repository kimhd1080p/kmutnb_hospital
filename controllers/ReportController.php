<?php

namespace app\controllers;
use Yii;
class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    //report 1 ในเวลาราชการ
    public function actionReport1()
    {
  
        $request = Yii::$app->request;
        if($request->post('startdate')&&$request->post('enddate')){
            $datestart=$request->post('startdate');
            $dateend=$request->post('enddate');
                  $sql1="SELECT  count(case when `sex` = 'ชาย' then 1 else null end) as ชาย
            ,count(case when `sex` = 'หญิง' then 1 else null end) as หญิง
            ,count(case when `status_id` = 1 then 1 else null end) as นักศึกษา
            ,count(case when `status_id` = 2 then 1 else null end) as อาจารย์
            ,count(case when `status_id` = 3 then 1 else null end) as เจ้าหน้าที่
            ,count(case when `status_id` = 4 then 1 else null end) as อื่นๆ
            , count(sex) as รวม
            
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid and p.p_sid=c.p_sid 
and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
        
      //report 2
              $sql2="SELECT  
            count(case when `casetype_idcasetype` like '%A%' then 1 else null end) as ปวดศรีษะ
            ,count(case when `casetype_idcasetype` like '%B%' then 1 else null end) as ไข้
            ,count(case when `casetype_idcasetype` like '%C%' then 1 else null end) as ไอ
            ,count(case when `casetype_idcasetype` like '%D%' then 1 else null end) as เจ็บคอ
            ,count(case when `casetype_idcasetype` like '%E%' then 1 else null end) as มีน้ำมูก
            ,count(case when `casetype_idcasetype` like '%F%' then 1 else null end) as ท้องเสีย
            ,count(case when `casetype_idcasetype` like '%G%' then 1 else null end) as ปวดกล้ามเนื้อ
            ,count(case when `casetype_idcasetype` like '%H%' then 1 else null end) as กระเพาะ
,count(case when `casetype_idcasetype` like '%I%' then 1 else null end) as ปวดท้องประจำเดือน
,count(case when `casetype_idcasetype` like '%J%' then 1 else null end) as ผื่นแพ้
,count(case when `casetype_idcasetype` like '%K%' then 1 else null end) as เจ็บตาคันตา
,count(case when `casetype_idcasetype` like '%L%' then 1 else null end) as ปวดฟันเหงือก
,count(case when `casetype_idcasetype` like '%M%' then 1 else null end) as ปวดหู
,count(case when `casetype_idcasetype` like '%N%' then 1 else null end) as stress
,count(case when `casetype_idcasetype` like '%O%' then 1 else null end) as อื่นๆ
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid and p.p_sid=c.p_sid  and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4";
        try {
            $rawData2= \yii::$app->db->createCommand($sql2)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider2= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData2,
            'pagination'=>FALSE
        ]);
        
        
        //report 3
              $sql3="SELECT  
count(case when `idservices` like '%A%' then 1 else null end) as เบิกยา
,count(case when `idservices` like '%B%' then 1 else null end) as ทำแผล
,count(case when `idservices` like '%C%' then 1 else null end) as แนะนำ
,count(case when `idservices` like '%D%' then 1 else null end) as ส่งโรงพยาบาล
,count(case when `idservices` like '%E%' then 1 else null end) as หยอดตาล้างตา
,count(case when `idservices` like '%F%' then 1 else null end) as สังเกตอาการ
,count(case when `idservices` like '%G%' then 1 else null end) as นอนพัก
,count(case when `idservices` like '%H%' then 1 else null end) as ประคบร้อนเย็น
,count(case when `idservices` like '%I%' then 1 else null end) as พบแพทย์
,count(case when `idservices` like '%J%' then 1 else null end) as เศษเหล็ก
,count(case when `idservices` like '%K%' then 1 else null end) as อื่นๆ
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid and p.p_sid=c.p_sid  and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4";
        try {
            $rawData3= \yii::$app->db->createCommand($sql3)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider3= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData3,
            'pagination'=>FALSE
        ]);
        
          //report 4 พบแพทย์
              $sql4="SELECT  
            count(case when `casetype_idcasetype` like '%ก%' then 1 else null end) as URL
            ,count(case when `casetype_idcasetype` like '%ข%' then 1 else null end) as กระเพราะ
            ,count(case when `casetype_idcasetype` like '%ค%' then 1 else null end) as ท้องเสีย
            ,count(case when `casetype_idcasetype` like '%ง%' then 1 else null end) as ปวดประจำเดือน
            ,count(case when `casetype_idcasetype` like '%จ%' then 1 else null end) as กล้ามเนื้อกระดูก
            ,count(case when `casetype_idcasetype` like '%ฉ%' then 1 else null end) as ผื่นแพ้ผิวหนัง
            ,count(case when `casetype_idcasetype` like '%ช%' then 1 else null end) as เจ็บตาคันตา
            ,count(case when `casetype_idcasetype` like '%ญ%' then 1 else null end) as ปวดฟัน
,count(case when `casetype_idcasetype` like '%ฏ%' then 1 else null end) as ปวดหู
,count(case when `casetype_idcasetype` like '%ฎ%' then 1 else null end) as stress
,count(case when `casetype_idcasetype` like '%ฐ%' then 1 else null end) as UTI
,count(case when `casetype_idcasetype` like '%ฒ%' then 1 else null end) as ตัวเหลือง
,count(case when `casetype_idcasetype` like '%ณ%' then 1 else null end) as แผล
,count(case when `casetype_idcasetype` like '%ด%' then 1 else null end) as Mass
,count(case when `casetype_idcasetype` like '%ต%' then 1 else null end) as เจ็บหน้าอก
,count(case when `casetype_idcasetype` like '%ถ%' then 1 else null end) as โรคเลือดต่างๆ
,count(case when `casetype_idcasetype` like '%ท%' then 1 else null end) as ไส้ติ่งอักเสษ
,count(case when `casetype_idcasetype` like '%ธ%' then 1 else null end) as เริม
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid and p.p_sid=c.p_sid  and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4";
        try {
            $rawData4= \yii::$app->db->createCommand($sql4)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider4= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData4,
            'pagination'=>FALSE
        ]);
        
            
            
           return $this->render('report1',['dataProvider1'=>$dataProvider1,'dataProvider2'=>$dataProvider2,'dataProvider3'=>$dataProvider3,'dataProvider4'=>$dataProvider4,'dates'=>$datestart,'datee'=>$dateend]);  
            
            
            
        }else { return $this->render('report1');}
        
        
        
       
    }
    //report 2 นอกเวลาราชการ
    public function actionReport2()
    {
  
        $request = Yii::$app->request;
        if($request->post('startdate')&&$request->post('enddate')){
            $datestart=$request->post('startdate');
            $dateend=$request->post('enddate');
                  $sql1="SELECT  count(case when `sex` = 'ชาย' then 1 else null end) as ชาย
            ,count(case when `sex` = 'หญิง' then 1 else null end) as หญิง
            ,count(case when `status_id` = 1 then 1 else null end) as นักศึกษา
            ,count(case when `status_id` = 2 then 1 else null end) as อาจารย์
            ,count(case when `status_id` = 3 then 1 else null end) as เจ้าหน้าที่
            ,count(case when `status_id` = 4 then 1 else null end) as อื่นๆ
            , count(sex) as รวม
            
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid  and p.p_sid=c.p_sid 
and (DATE(timestam) BETWEEN '$datestart' AND '$dateend') and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4))";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
        
      //report 2
              $sql2="SELECT  
         count(case when `casetype_idcasetype` like '%A%' then 1 else null end) as ปวดศรีษะ
            ,count(case when `casetype_idcasetype` like '%B%' then 1 else null end) as ไข้
            ,count(case when `casetype_idcasetype` like '%C%' then 1 else null end) as ไอ
            ,count(case when `casetype_idcasetype` like '%D%' then 1 else null end) as เจ็บคอ
            ,count(case when `casetype_idcasetype` like '%E%' then 1 else null end) as มีน้ำมูก
            ,count(case when `casetype_idcasetype` like '%F%' then 1 else null end) as ท้องเสีย
            ,count(case when `casetype_idcasetype` like '%G%' then 1 else null end) as ปวดกล้ามเนื้อ
            ,count(case when `casetype_idcasetype` like '%H%' then 1 else null end) as กระเพาะ
,count(case when `casetype_idcasetype` like '%I%' then 1 else null end) as ปวดท้องประจำเดือน
,count(case when `casetype_idcasetype` like '%J%' then 1 else null end) as ผื่นแพ้
,count(case when `casetype_idcasetype` like '%K%' then 1 else null end) as เจ็บตาคันตา
,count(case when `casetype_idcasetype` like '%L%' then 1 else null end) as ปวดฟันเหงือก
,count(case when `casetype_idcasetype` like '%M%' then 1 else null end) as ปวดหู
,count(case when `casetype_idcasetype` like '%N%' then 1 else null end) as stress
,count(case when `casetype_idcasetype` like '%O%' then 1 else null end) as อื่นๆ
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid and p.p_sid=c.p_sid  and DATE(timestam) BETWEEN '$datestart' AND '$dateend' AND ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4))";
        try {
            $rawData2= \yii::$app->db->createCommand($sql2)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider2= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData2,
            'pagination'=>FALSE
        ]);
        
        
        //report 3
              $sql3="SELECT  
count(case when `idservices` like '%A%' then 1 else null end) as เบิกยา
,count(case when `idservices` like '%B%' then 1 else null end) as ทำแผล
,count(case when `idservices` like '%C%' then 1 else null end) as แนะนำ
,count(case when `idservices` like '%D%' then 1 else null end) as ส่งโรงพยาบาล
,count(case when `idservices` like '%E%' then 1 else null end) as หยอดตาล้างตา
,count(case when `idservices` like '%F%' then 1 else null end) as สังเกตอาการ
,count(case when `idservices` like '%G%' then 1 else null end) as นอนพัก
,count(case when `idservices` like '%H%' then 1 else null end) as ประคบร้อนเย็น
,count(case when `idservices` like '%I%' then 1 else null end) as พบแพทย์
,count(case when `idservices` like '%J%' then 1 else null end) as เศษเหล็ก
,count(case when `idservices` like '%K%' then 1 else null end) as อื่นๆ
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid and p.p_sid=c.p_sid  and DATE(timestam) BETWEEN '$datestart' AND '$dateend'and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4))";
        try {
            $rawData3= \yii::$app->db->createCommand($sql3)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider3= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData3,
            'pagination'=>FALSE
        ]);
            
            
      //report 4 พบแพทย์
              $sql4="SELECT  
            count(case when `casetype_idcasetype` like '%ก%' then 1 else null end) as URL
            ,count(case when `casetype_idcasetype` like '%ข%' then 1 else null end) as กระเพราะ
            ,count(case when `casetype_idcasetype` like '%ค%' then 1 else null end) as ท้องเสีย
            ,count(case when `casetype_idcasetype` like '%ง%' then 1 else null end) as ปวดประจำเดือน
            ,count(case when `casetype_idcasetype` like '%จ%' then 1 else null end) as กล้ามเนื้อกระดูก
            ,count(case when `casetype_idcasetype` like '%ฉ%' then 1 else null end) as ผื่นแพ้ผิวหนัง
            ,count(case when `casetype_idcasetype` like '%ช%' then 1 else null end) as เจ็บตาคันตา
            ,count(case when `casetype_idcasetype` like '%ญ%' then 1 else null end) as ปวดฟัน
,count(case when `casetype_idcasetype` like '%ฏ%' then 1 else null end) as ปวดหู
,count(case when `casetype_idcasetype` like '%ฎ%' then 1 else null end) as stress
,count(case when `casetype_idcasetype` like '%ฐ%' then 1 else null end) as UTI
,count(case when `casetype_idcasetype` like '%ฒ%' then 1 else null end) as ตัวเหลือง
,count(case when `casetype_idcasetype` like '%ณ%' then 1 else null end) as แผล
,count(case when `casetype_idcasetype` like '%ด%' then 1 else null end) as Mass
,count(case when `casetype_idcasetype` like '%ต%' then 1 else null end) as เจ็บหน้าอก
,count(case when `casetype_idcasetype` like '%ถ%' then 1 else null end) as โรคเลือดต่างๆ
,count(case when `casetype_idcasetype` like '%ท%' then 1 else null end) as ไส้ติ่งอักเสษ
,count(case when `casetype_idcasetype` like '%ธ%' then 1 else null end) as เริม
FROM `casepatient` c,patient p WHERE p.p_pid=c.p_pid and p.p_sid=c.p_sid  and DATE(timestam) BETWEEN '$datestart' AND '$dateend'and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4))";
        try {
            $rawData4= \yii::$app->db->createCommand($sql4)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider4= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData4,
            'pagination'=>FALSE
        ]);
        
            
            
           return $this->render('report2',['dataProvider1'=>$dataProvider1,'dataProvider2'=>$dataProvider2,'dataProvider3'=>$dataProvider3,'dataProvider4'=>$dataProvider4,'dates'=>$datestart,'datee'=>$dateend]);  
            
            
        }else { return $this->render('report2');}
        
        
        
       
    }
    

   //รายงานการปฏิบัติงานของเจ้าหน้าที่ในเวลาราชการ 
    Public function actionReport3()
    {
  
        $request = Yii::$app->request;
        if($request->post('startdate')&&$request->post('enddate')){
            $datestart=$request->post('startdate');
            $dateend=$request->post('enddate');
                  $sql1="SELECT  s.name as 'ชื่อ-สกุล',s.A as เบิกยา ,s.B as ทำแผล,
s.C as แนะนำ,
s.D as ส่งโรงพยาบาล,
s.E as หยอดตาล้างตา,
s.F as สังเกตอาการ,
s.G as นอนพัก,
s.H as ประคบร้อนเย็น,
s.I as พบแพทย์,
s.J as เศษเหล็ก,
s.K as อื่นๆ,
sum(A+B+C+D+E+F+G+H+I+J+K) as รวม
 FROM(SELECT nurse_id,name,timestam
,count(case when `idservices` like '%A%' then 1 else null end) as A
,count(case when `idservices` like '%B%' then 1 else null end) as B
,count(case when `idservices` like '%C%' then 1 else null end) as C
,count(case when `idservices` like '%D%' then 1 else null end) as D
,count(case when `idservices` like '%E%' then 1 else null end) as E
,count(case when `idservices` like '%F%' then 1 else null end) as F
,count(case when `idservices` like '%G%' then 1 else null end) as G
,count(case when `idservices` like '%H%' then 1 else null end) as H
,count(case when `idservices` like '%I%' then 1 else null end) as I
,count(case when `idservices` like '%J%' then 1 else null end) as J
,count(case when `idservices` like '%K%' then 1 else null end) as K
FROM casepatient c, nurse n WHERE c.nurse_id=n.id and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4 GROUP BY c.nurse_id ) s  
  GROUP BY s.nurse_id";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
        
      
            
            
           return $this->render('report3',['dataProvider1'=>$dataProvider1,'sql'=>$sql1,'dates'=>$datestart,'datee'=>$dateend]);  
            
            
            
        }else { return $this->render('report3');}

}

//รายงานการปฏิบัติงานของเจ้าหน้าที่นอกเวลาราชการ
 Public function actionReport4()
    {
  
        $request = Yii::$app->request;
        if($request->post('startdate')&&$request->post('enddate')){
            $datestart=$request->post('startdate');
            $dateend=$request->post('enddate');
                  $sql1="SELECT  s.name as 'ชื่อ-สกุล',s.A as เบิกยา ,s.B as ทำแผล,
s.C as แนะนำ,
s.D as ส่งโรงพยาบาล,
s.E as หยอดตาล้างตา,
s.F as สังเกตอาการ,
s.G as นอนพัก,
s.H as ประคบร้อนเย็น,
s.I as พบแพทย์,
s.J as เศษเหล็ก,
s.K as อื่นๆ,
sum(A+B+C+D+E+F+G+H+I+J+K) as รวม
 FROM(SELECT nurse_id,name,timestam
,count(case when `idservices` like '%A%' then 1 else null end) as A
,count(case when `idservices` like '%B%' then 1 else null end) as B
,count(case when `idservices` like '%C%' then 1 else null end) as C
,count(case when `idservices` like '%D%' then 1 else null end) as D
,count(case when `idservices` like '%E%' then 1 else null end) as E
,count(case when `idservices` like '%F%' then 1 else null end) as F
,count(case when `idservices` like '%G%' then 1 else null end) as G
,count(case when `idservices` like '%H%' then 1 else null end) as H
,count(case when `idservices` like '%I%' then 1 else null end) as I
,count(case when `idservices` like '%J%' then 1 else null end) as J
,count(case when `idservices` like '%K%' then 1 else null end) as K
FROM casepatient c, nurse n WHERE c.nurse_id=n.id and (DATE(timestam) BETWEEN '$datestart' AND '$dateend') and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4)) GROUP BY c.nurse_id) s  
  GROUP BY s.nurse_id";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
        
      
            
            
           return $this->render('report4',['dataProvider1'=>$dataProvider1,'sql'=>$sql1,'dates'=>$datestart,'datee'=>$dateend]);  
            
            
            
        }else { return $this->render('report4');}

}

  //report 5 อุบัติเหตุในเวลาราชการ
    public function actionReport5()
    {
  
        $request = Yii::$app->request;
        if($request->post('startdate')&&$request->post('enddate')&&$request->post('type')){
            $datestart=$request->post('startdate');
            $dateend=$request->post('enddate');
            $type=$request->post('type');
                  $sql1="SELECT  count(case when `sex` = 'ชาย' then 1 else null end) as ชาย
            ,count(case when `sex` = 'หญิง' then 1 else null end) as หญิง
            ,count(case when `status_id` = 1 then 1 else null end) as นักศึกษา
            ,count(case when `status_id` = 2 then 1 else null end) as อาจารย์
            ,count(case when `status_id` = 3 then 1 else null end) as เจ้าหน้าที่
            ,count(case when `status_id` = 4 then 1 else null end) as อื่นๆ
            , count(sex) as รวม
            
FROM `accident` a,patient p WHERE p.p_pid=a.p_pid and p.p_sid=a.p_sid and a.inlocattype_idinlocattype=$type
and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
        
      //report 2
              $sql2="SELECT  
            count(case when `accidenttype_idaccidenttype` like '%1%' then 1 else null end) as 'ถูกตัด/บาด/ทิ่มแทง'
            ,count(case when `accidenttype_idaccidenttype` like '%2%' then 1 else null end) as 'สิ่งของ/สารเคมีเข้าตา'
            ,count(case when `accidenttype_idaccidenttype` like '%3%' then 1 else null end) as 'สัมผัสความร้อน/เย็น'
            ,count(case when `accidenttype_idaccidenttype` like '%4%' then 1 else null end) as 'โดนสิ่งของกระแทก/ชน'
            ,count(case when `accidenttype_idaccidenttype` like '%5%' then 1 else null end) as 'สัมผัสสารเคมี/สารผิษ'
            ,count(case when `accidenttype_idaccidenttype` like '%6%' then 1 else null end) as 'ถูกหนีบ/ดึง'
            ,count(case when `accidenttype_idaccidenttype` like '%7%' then 1 else null end) as 'หกล้ม/ลื่นล้ม'
            ,count(case when `accidenttype_idaccidenttype` like '%8%' then 1 else null end) as 'ถูกไฟฟ้าช๊อต'
             ,count(case when `accidenttype_idaccidenttype` like '%9%' then 1 else null end) as 'อื่นๆ'

FROM `accident` a,patient p WHERE p.p_pid=a.p_pid and p.p_sid=a.p_sid and a.inlocattype_idinlocattype=$type and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4";
        try {
            $rawData2= \yii::$app->db->createCommand($sql2)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider2= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData2,
            'pagination'=>FALSE
        ]);
        
        //report 3
              $sql3="SELECT  
            count(case when `medicaltreatment_idmedicaltreatment` like '%1%' then 1 else null end) as 'ปฐมพยาบาล'
            ,count(case when `medicaltreatment_idmedicaltreatment` like '%2%' then 1 else null end) as 'พบแพทย์ / ส่งโรงพยาบาล'
       

FROM `accident` a,patient p WHERE p.p_pid=a.p_pid and p.p_sid=a.p_sid and a.inlocattype_idinlocattype=$type and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4";
        try {
            $rawData3= \yii::$app->db->createCommand($sql3)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider3= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData3,
            'pagination'=>FALSE
        ]);   
        
          //report 4 คณะ
              $sql4="SELECT  
          f.faculty as 'คณะ',COUNT(`idaccident`) as 'รวม'
FROM accident a, patient p, faculty f,department d WHERE p.p_pid=a.p_pid and p.p_sid=a.p_sid AND f.idfaculty=d.idfaculty AND p.department_id=d.iddepartment and 
a.inlocattype_idinlocattype=$type  and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(timestam) BETWEEN 0 AND 4 GROUP BY f.idfaculty";
        try {
            $rawData4= \yii::$app->db->createCommand($sql4)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider4= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData4,
            'pagination'=>FALSE
        ]);   
           return $this->render('report5',['dataProvider1'=>$dataProvider1,'dataProvider2'=>$dataProvider2,'dataProvider3'=>$dataProvider3,'dataProvider4'=>$dataProvider4, 'dates'=>$datestart,'datee'=>$dateend]);  
        }else { return $this->render('report5');}
    }

      //report 6 อุบัติเหตุนอกเวลาราชการ
    public function actionReport6()
    {
  
        $request = Yii::$app->request;
        if($request->post('startdate')&&$request->post('enddate')&&$request->post('type')){
            $datestart=$request->post('startdate');
            $dateend=$request->post('enddate');
            $type=$request->post('type');
                  $sql1="SELECT  count(case when `sex` = 'ชาย' then 1 else null end) as ชาย
            ,count(case when `sex` = 'หญิง' then 1 else null end) as หญิง
            ,count(case when `status_id` = 1 then 1 else null end) as นักศึกษา
            ,count(case when `status_id` = 2 then 1 else null end) as อาจารย์
            ,count(case when `status_id` = 3 then 1 else null end) as เจ้าหน้าที่
            ,count(case when `status_id` = 4 then 1 else null end) as อื่นๆ
            , count(sex) as รวม
            
FROM `accident` a,patient p WHERE p.p_pid=a.p_pid and p.p_sid=a.p_sid and a.inlocattype_idinlocattype=$type
and (DATE(timestam) BETWEEN '$datestart' AND '$dateend') and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4))";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
        
      //report 2
              $sql2="SELECT  
            count(case when `accidenttype_idaccidenttype` like '%1%' then 1 else null end) as 'ถูกตัด/บาด/ทิ่มแทง'
            ,count(case when `accidenttype_idaccidenttype` like '%2%' then 1 else null end) as 'สิ่งของ/สารเคมีเข้าตา'
            ,count(case when `accidenttype_idaccidenttype` like '%3%' then 1 else null end) as 'สัมผัสความร้อน/เย็น'
            ,count(case when `accidenttype_idaccidenttype` like '%4%' then 1 else null end) as 'โดนสิ่งของกระแทก/ชน'
            ,count(case when `accidenttype_idaccidenttype` like '%5%' then 1 else null end) as 'สัมผัสสารเคมี/สารผิษ'
            ,count(case when `accidenttype_idaccidenttype` like '%6%' then 1 else null end) as 'ถูกหนีบ/ดึง'
            ,count(case when `accidenttype_idaccidenttype` like '%7%' then 1 else null end) as 'หกล้ม/ลื่นล้ม'
            ,count(case when `accidenttype_idaccidenttype` like '%8%' then 1 else null end) as 'ถูกไฟฟ้าช๊อต'
             ,count(case when `accidenttype_idaccidenttype` like '%9%' then 1 else null end) as 'อื่นๆ'

FROM `accident` a,patient p WHERE p.p_pid=a.p_pid and p.p_sid=a.p_sid and a.inlocattype_idinlocattype=$type and (DATE(timestam) BETWEEN '$datestart' AND '$dateend') and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4))";
        try {
            $rawData2= \yii::$app->db->createCommand($sql2)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider2= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData2,
            'pagination'=>FALSE
        ]);
        
        //report 3
              $sql3="SELECT  
            count(case when `medicaltreatment_idmedicaltreatment` like '%1%' then 1 else null end) as 'ปฐมพยาบาล'
            ,count(case when `medicaltreatment_idmedicaltreatment` like '%2%' then 1 else null end) as 'พบแพทย์ / ส่งโรงพยาบาล'
       

FROM `accident` a,patient p WHERE p.p_pid=a.p_pid and p.p_sid=a.p_sid and a.inlocattype_idinlocattype=$type and (DATE(timestam) BETWEEN '$datestart' AND '$dateend') and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4))";
        try {
            $rawData3= \yii::$app->db->createCommand($sql3)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider3= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData3,
            'pagination'=>FALSE
        ]);   
        
        //report 4 คณะ
              $sql4="SELECT  
          f.faculty as 'คณะ',COUNT(`idaccident`) as 'รวม'
FROM accident a, patient p, faculty f,department d WHERE p.p_pid=a.p_pid and p.p_sid=a.p_sid AND f.idfaculty=d.idfaculty AND p.department_id=d.iddepartment and 
a.inlocattype_idinlocattype=$type and (DATE(timestam) BETWEEN '$datestart' AND '$dateend') and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4)) GROUP BY f.idfaculty";
        try {
            $rawData4= \yii::$app->db->createCommand($sql4)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider4= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData4,
            'pagination'=>FALSE
        ]);   
           return $this->render('report6',['dataProvider1'=>$dataProvider1,'dataProvider2'=>$dataProvider2,'dataProvider3'=>$dataProvider3,'dataProvider4'=>$dataProvider4,'dates'=>$datestart,'datee'=>$dateend]);  
        }else { return $this->render('report6');}
    }
    
    public function actionReport7() //รายงานการจ่ายยาในเวลา
    {
  
        $request = Yii::$app->request;
        if($request->post('startdate')&&$request->post('enddate')&&$request->post('type')){
            $datestart=$request->post('startdate');
            $dateend=$request->post('enddate');
            $type=$request->post('type');
                  $sql1="SELECT medicine as 'ชื่อยา' , sum(qty) as 'รวม' , package as 'บรรจุภัณฑ์' FROM medicine m, medicinetype mt, casemedicine cm, medicinepackage mp, casepatient cp  WHERE 
                          m.idmedicinetype=mt.idmedicinetype and m.idmedicine=cm.idmedicine and cm.medicinepackage_id=mp.id and m.idmedicinetype=$type and cp.idcase=cm.idcase
                         and (DATE(timestam) BETWEEN '$datestart' AND '$dateend') and ((WEEKDAY(timestam) BETWEEN 5 AND 6 and TIME(timestam) BETWEEN '00:00' AND '23:59') or (TIME(timestam) BETWEEN '16:01' AND '23:59' and WEEKDAY(timestam) BETWEEN 0 AND 4)) GROUP BY m.idmedicine ,cm.medicinepackage_id";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
        

     
        
      
           return $this->render('report7',['dataProvider1'=>$dataProvider1,'type'=>$type,'dates'=>$datestart,'datee'=>$dateend]);  
        }else { return $this->render('report7');}
    }
    
    public function actionReport8() //รายงานการจ่ายยานอกเวลา
    {
  
        $request = Yii::$app->request;
        if($request->post('startdate')&&$request->post('enddate')&&$request->post('type')){
            $datestart=$request->post('startdate');
            $dateend=$request->post('enddate');
            $type=$request->post('type');
                  $sql1="SELECT medicine as 'ชื่อยา' , sum(qty) as 'รวม' , package as 'บรรจุภัณฑ์' FROM medicine m, medicinetype mt, casemedicine cm, medicinepackage mp, casepatient cp  WHERE 
                          m.idmedicinetype=mt.idmedicinetype and m.idmedicine=cm.idmedicine and cm.medicinepackage_id=mp.id and m.idmedicinetype=$type and cp.idcase=cm.idcase
                          and DATE(timestam) BETWEEN '$datestart' AND '$dateend' and TIME(cp.timestam) BETWEEN '00:00' AND '16:00' and WEEKDAY(cp.timestam) BETWEEN 0 AND 4 GROUP BY m.idmedicine ,cm.medicinepackage_id";
                
        try {
            $rawData1= \yii::$app->db->createCommand($sql1)->queryAll();
            
        } catch (\yii\db\Exception $exc) {
            throw new \yii\web\ConflictHttpException("sql error");
        }
        $dataProvider1= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData1,
            'pagination'=>FALSE
        ]);
        

     
        
      
           return $this->render('report8',['dataProvider1'=>$dataProvider1,'type'=>$type,'dates'=>$datestart,'datee'=>$dateend]);  
        }else { return $this->render('report8');}
    }


}