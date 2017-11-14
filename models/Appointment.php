<?php

namespace app\models;

use Yii;
use app\models\Casedoctortype;
use yii\helpers\ArrayHelper;
//use app\models\Event;
/**
 * This is the model class for table "appointment".
 *
 * @property integer $ID
 * @property string $appointment_time
 * @property integer $medical_certificate
 * @property integer $todoctor
 * @property string $timestam
 * @property string $detial
 * @property integer $user_id
 * @property integer $user_id2
 * @property string $patient_p_pid
 * @property string $patient_p_sid
 * @property integer $casetype_idcasetype
 * @property integer $doctor_iddoctor
 *
 * @property Casetype $casetypeIdcasetype
 * @property Doctor $doctorIddoctor
 * @property Patient $patientPP
 * @property User $user
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appointment_time', 'timestam'], 'safe'],
            [['medical_certificate', 'todoctor', 'nurse_id', 'nurse_id2', 'patient_p_pid', 'patient_p_sid', 'doctor_iddoctor'], 'integer'],
            [['detial','casetype_idcasetype'], 'string'],
            [['nurse_id', 'patient_p_pid', 'patient_p_sid', 'casetype_idcasetype', 'doctor_iddoctor',], 'required'],
            // [['todoctor'], $this->Checkn() ],
            [['doctor_iddoctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_iddoctor' => 'iddoctor']],
            [['patient_p_pid', 'patient_p_sid'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_p_pid' => 'p_pid', 'patient_p_sid' => 'p_sid']],
            [['nurse_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nurse_id' => 'id']],
            [['nurse_id2'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nurse_id' => 'id']],
        ];
    }
    
    
    // in User.php i've declared constant that stores event name
//const EVENT_NEW_APPOINTMENT = 'new-appointment';
//
//// say, whenever new user registers, below method will send an email.
//
//
//// one more hanlder.
//
//public function notification_app($event){
//  Yii::$app->getSession()->setFlash('appointments', [
//     'type' => 'success',
//     'duration' => 5000,
//     'icon' => 'fa fa-users',
//     'message' => "ของคุณ".$this->patient->p_name." ".$this->patient->p_surname,
//     'title' => 'มีรายการนัดใหม่',
//     'positonY' => 'top',
//     'positonX' => 'right'
// ]);
//}
//public function init(){
//
//  $this->on(self::EVENT_NEW_APPOINTMENT, [$this, 'notification_app']);
// 
//
//  // first parameter is the name of the event and second is the handler. 
//  // For handlers I use methods sendMail and notification
//  // from $this class.
//}

//public function init()
//    {
//        $this->on(Event::ACTION_ADD, ['app\models\Event', 'sendInLog']);
//     
//        $this->on(Event::ACTION_UPDATE, ['app\models\Event', 'sendInLog']);
//      
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'appointment_time' => 'เวลานัด',
            'medical_certificate' => 'ขอใบรับรองแพทย์',
            'todoctor' => 'สถานะการพบแพทย์',
            'timestam' => 'วันที่บันทึก',
            'detial' => 'รายละเอียด',
            'nurse_id' => 'พยาบาล',
            'nurse_id2' => 'เวชระเบียน',
            'patient_p_pid' => 'รหัสบัตรประจำตัวประชาชน',
            'patient_p_sid' => 'รหัสนักศึกษา',
          'casetype_idcasetype' => 'ประเภทอาการเจ็บป่วย',
            'doctor_iddoctor' => 'ชื่อแพทย์',
            'casetypevalue' => 'ประเภทอาการเจ็บป่วย',
        ];
    }

    
    public function casetypeToArray()
{
  return $this->casetype_idcasetype = explode(',', $this->casetype_idcasetype);
}
//public function Checkn(){
//    if($this->todoctor ==0){return 'required';}
//    else{return 'safe';}
//}


/**
     * @inheritdoc
     */
    public function getCasetypevalue(){
    $casetype = ArrayHelper::map(Casedoctortype::find()->all(),'id','name');
    $casetypeSelected = explode(',', $this->casetype_idcasetype);
    $casetypeSelectedName = [];
    foreach ($casetype as $key => $casetypeName) {
      foreach ($casetypeSelected as $casetypeKey) {

        if($key === $casetypeKey){
          $casetypeSelectedName[] = $casetypeName;
        }
      }
    }

    return implode(', ', $casetypeSelectedName);
}
    /**
     * @return \yii\db\ActiveQuery
     */
   

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['iddoctor' => 'doctor_iddoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['p_pid' => 'patient_p_pid', 'p_sid' => 'patient_p_sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'nurse_id']);
    }
     public function getUser1()
    {
        return $this->hasOne(User::className(), ['id' => 'nurse_id2']);
    }
}
