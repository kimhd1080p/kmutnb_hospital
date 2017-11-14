<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `app\models\Patient`.
 */
class PatientSearch2 extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_pid', 'p_sid', 'status_id', 'department_id', 'studentclass_id'], 'integer'],
            [['p_name', 'p_surname', 'sex', 'p_birthday', 'p_address', 'p_tel', 'p_allegy', 'p_disease', 'documentindex','ps'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
     public function searchdata($id,$api_url)
    {
    
 $access_token = '7eo9R24SW-ThWcutKBr7Si6PcFtsMrj6'; // <----- API - Access Token Here
//$id = '5902041420289'; // <----- Student
//$api_url = 'https://api.account.kmutnb.ac.th/api/account-api/student-info'; // <----- API URL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('id' => $id));

if(($response = curl_exec($ch)) === false){
    Yii::$app->getSession()->setFlash('alert', [
                                    'type' => 'danger',
                                     'duration' => 5000,
                                      'icon' => 'fa fa-users',
                                        'message' => 'ไม่สามารถติดต่อฐานข้อมูลได้ '. curl_errno($ch) . ' - ' . curl_error($ch),
                                       'title' => 'ข้อผิดพลาด',
                                       'positonY' => 'top',
                                       'positonX' => 'right'
                                                                ]);
    
	//echo 'Curl error: ' . curl_errno($ch) . ' - ' . curl_error($ch);
}else{
	$json_data = json_decode($response, true);
	if(empty($json_data)){
		Yii::$app->getSession()->setFlash('alert', [
                                    'type' => 'danger',
                                     'duration' => 5000,
                                      'icon' => 'fa fa-users',
                                        'message' => 'ไม่พบข้อมูลนี้',
                                       'title' => 'ผลการค้นหา',
                                       'positonY' => 'top',
                                       'positonX' => 'right'
                                                                ]);
            //echo 'API Error ' . print_r($response, true);
                return 'error';
	}else{
		//print_r($json_data);
                return $json_data;
	}	
}
curl_close($ch); 
    }
 public function searchdatastu($id)
    {
     $api_url = 'https://api.account.kmutnb.ac.th/api/account-api/student-info';
     return $this->searchdata($id,$api_url);
    }
    public function searchdatastx($id)
    {
     $api_url = 'https://api.account.kmutnb.ac.th/api/account-api/exchange-student-info';
     return $this->searchdata($id,$api_url);
    }
        public function searchdataupis($id)
    {
     $api_url = 'https://api.account.kmutnb.ac.th/api/account-api/personel-info';
     return $this->searchdata($id,$api_url);
    }
  public function savedata($data,$code)
    {  
      // insert a new row of data
//$patient = new Patient();

if($code==1){
 $l='';
      $sex='';
      if($data['SEX']==1)$sex='ชาย';
      if($data['SEX']==2)$sex='หญิง';
      if($data['LEVEL_DESC']=='ปวช.')$l=1;
      if($data['LEVEL_DESC']=='ปริญญาตรี')$l=2;
      if($data['LEVEL_DESC']=='ปริญญาโท')$l=3;
      if($data['LEVEL_DESC']=='ปริญญาเอก')$l=4;    
    
Yii::$app->db->createCommand()->insert('patient', [
    'p_pid' => $data['ID_CARD'],
    'p_sid' => $data['STU_CODE'],
    'p_name' => $data['STU_FIRST_NAME_THAI'],
    'p_surname' => $data['STU_LAST_NAME_THAI'],
    'sex' => $sex,
    'p_birthday' => $data['B_DATE'],
    'department_id' => $data['DEPT_CODE'],
    'studentclass_id' => $l,
    'status_id' => 1,
  
])->execute();      
      
//$patient->p_pid = $data['ID_CARD'];
//$patient->p_sid = $data['STU_CODE'];
//$patient->p_name = $data['STU_FIRST_NAME_THAI'];
//$patient->p_surname =$data['STU_LAST_NAME_THAI'];
//$patient->sex = $sex;
//$patient->p_birthday = $data['B_DATE'];
//$patient->department_id = $data['DEPT_CODE'];
//$patient->studentclass_id = $l;
//$patient->status_id = 1;
//$patient->save();


Yii::$app->getSession()->setFlash('alert', [
    'type' => 'success',
   'duration' => 5000,
    'icon' => 'fa fa-users',
     'message' => 'ชื่อ คุณ'.$data['STU_FIRST_NAME_THAI'].' '.$data['STU_LAST_NAME_THAI'],
     'title' => 'รายงานการเพิ่มข้อมูลเข้ามาในระบบจาก ฐานข้อมูลงานทะเบียน',
 'positonY' => 'top',
  'positonX' => 'right'
    ]);
                            


}
if($code==2){
    $sex='';
    $status='';
      if($data['pre_name_th']=='นาย')$sex='ชาย';
      if($data['pre_name_th']=='นาง')$sex='หญิง';
      if($data['pre_name_th']=='นางสาว')$sex='หญิง';
       if($data['position_duty_id']==1||$data['position_duty_id']==2||$data['position_duty_id']==3||$data['position_duty_id']==4||$data['position_duty_id']==5)$status=2;else{$status=3;}
Yii::$app->db->createCommand()->insert('patient', [
    'p_pid' => $data['pid'],
    'p_sid' => $data['pid'],
    'p_name' => $data['first_name_th'],
    'p_surname' => $data['last_name_th'],
    'sex' => $sex,
    'p_birthday' => $data['birthday'],
    'department_id' => $data['agencies_part_id'],
    'status_id' => $status,

])->execute();      


Yii::$app->getSession()->setFlash('alert', [
    'type' => 'success',
   'duration' => 5000,
    'icon' => 'fa fa-users',
     'message' => 'ชื่อ คุณ'.$data['first_name_th'].' '.$data['last_name_th'],
     'title' => 'รายงานการเพิ่มข้อมูลเข้ามาในระบบจาก ฐานข้อมูลบุคลากร',
 'positonY' => 'top',
  'positonX' => 'right'
    ]);
}
if($code==3){ //นศ แลกเปลี่ยน

      $sex='';
      if($data['titlename']=='Mr.')$sex='Male';
      if($data['titlename']=='Mrs.')$sex='Female';
      if($data['titlename']=='Miss')$sex='Female';


Yii::$app->db->createCommand()->insert('patient', [
    'p_pid' => $data['exchangestdno'],
    'p_sid' => $data['exchangestdno'],
    'p_name' => $data['name'],
    'p_surname' => $data['surname'],
    'sex' => $sex,
    'p_birthday' => $data['birthday'],
    'department_id' =>50,
    'status_id' => 1,
  
])->execute();          
Yii::$app->getSession()->setFlash('alert', [
    'type' => 'success',
   'duration' => 5000,
    'icon' => 'fa fa-users',
     'message' => 'ชื่อ คุณ'.$data['name'].' '.$data['surname'],
     'title' => 'รายงานการเพิ่มข้อมูลเข้ามาในระบบจาก ฐานข้อมูลนักศึกษาแลกเปลี่ยน',
 'positonY' => 'top',
  'positonX' => 'right'
    ]);
}



  }
   
    
     
    public function search1($params)
    {
     
        $this->load($params);
        

            $s = Patient::find()->where(['p_pid' => $this->ps])->orWhere(['p_sid' => $this->ps])->orWhere([ 'p_name' => $this->ps])
          ->orWhere([ 'p_surname' => $this->ps])->count();
        //$s=0;
            if($s<1){
               //$data1= searchdatastu($this->ps);
               if($this->searchdatastu($this->ps)=="error"){
                   //return $this->search($params);
                   if($this->searchdatastx($this->ps)=="error"){
                        if($this->searchdataupis($this->ps)=="error"){
                            
                            return $this->search($params); //return
                            
                        }else{
                            $this->savedata($this->searchdataupis($this->ps),2); //1 นักศึกษา 2พนักงานอาจารย์
                            return $this->search($params);} 
                   }else{
                       $this->savedata($this->searchdatastx($this->ps),3);
                       return $this->search($params);}     
               }else{
                   $this->savedata($this->searchdatastu($this->ps),1);
   
                   return $this->search($params);} 
            }else{ return $this->search($params);}
            
    }
    
    public function search($params)
    {
        $query = Patient::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
               
            return $dataProvider;
        }

        // grid filtering conditions
        // 
          $query->joinWith('status')
        ->Where(['p_pid' => $this->ps,])
        ->orWhere([ 'p_sid' => $this->ps]) 
         ->orWhere([ 'p_name' => $this->ps])
          ->orWhere([ 'p_surname' => $this->ps]); //ค้นหาหลายฟิว
//        $query->andFilterWhere([
//            'p_pid' => $this->ps,
//          'p_sid' => $this->ps,
//         
//     ]);
////
//    $query->Whree(['like', 'p_name', $this->ps])
//        ->orWhree(['like', 'p_surname', $this->ps]);
            

            return $dataProvider;
    }
}
