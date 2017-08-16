<?php

namespace app\models;

use Yii;

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
            [['medical_certificate', 'todoctor', 'user_id', 'user_id2', 'patient_p_pid', 'patient_p_sid', 'casetype_idcasetype', 'doctor_iddoctor'], 'integer'],
            [['detial'], 'string'],
            [['user_id', 'patient_p_pid', 'patient_p_sid', 'casetype_idcasetype', 'doctor_iddoctor'], 'required'],
            [['casetype_idcasetype'], 'exist', 'skipOnError' => true, 'targetClass' => Casetype::className(), 'targetAttribute' => ['casetype_idcasetype' => 'idcasetype']],
            [['doctor_iddoctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_iddoctor' => 'iddoctor']],
            [['patient_p_pid', 'patient_p_sid'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_p_pid' => 'p_pid', 'patient_p_sid' => 'p_sid']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_id2'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id2' => 'id']],
        ];
    }

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
            'user_id' => 'พยาบาล',
            'user_id2' => 'เวชระเบียน',
            'patient_p_pid' => 'รหัสบัตรประจำตัวประชาชน',
            'patient_p_sid' => 'รหัสนักศึกษา',
            'casetype_idcasetype' => 'ประเภทอาการป่วย',
            'doctor_iddoctor' => 'ชื่อแพทย์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasetype()
    {
        return $this->hasOne(Casetype::className(), ['idcasetype' => 'casetype_idcasetype']);
    }

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
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
     public function getUser1()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id2']);
    }
}
