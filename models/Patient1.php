<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property string $p_pid
 * @property string $p_sid
 * @property string $p_name
 * @property string $p_surname
 * @property string $p_birthday
 * @property string $p_address
 * @property string $p_tel
 * @property string $p_allegy
 * @property string $p_disease
 * @property integer $status_id
 * @property integer $department_id
 * @property integer $studentclass_id
 *
 * @property Appointment[] $appointments
 * @property CasePatient[] $casePatients
 * @property Studentclass $studentclass
 * @property Department $department
 * @property Status $status
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_pid', 'p_sid', 'status_id', 'department_id', 'studentclass_id'], 'required'],
            [['p_pid', 'p_sid', 'status_id', 'department_id', 'studentclass_id'], 'integer'],
            [['p_birthday'], 'safe'],
            [['p_name', 'p_surname'], 'string', 'max' => 45],
            [['p_address', 'p_allegy', 'p_disease'], 'string', 'max' => 100],
            [['p_tel'], 'string', 'max' => 15],
            [['studentclass_id'], 'exist', 'skipOnError' => true, 'targetClass' => Studentclass::className(), 'targetAttribute' => ['studentclass_id' => 'studentclass_id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'iddepartment']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'status_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'p_pid' => 'รหัสบัตรประชาชน',
            'p_sid' => 'รหัสนักศึกษา',
            'p_name' => 'ชื่อ',
            'p_surname' => 'นามสกุล',
            'p_birthday' => 'วันเกิด',
            'p_address' => 'ที่อยู่',
            'p_tel' => 'เบอร์โทร',
            'p_allegy' => 'ประวัติแพ้ยา',
            'p_disease' => 'โรคประจำตัว',
            'status_id' => 'Status ID',
            'department_id' => 'Department ID',
            'studentclass_id' => 'Studentclass ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['patient_p_pid' => 'p_pid', 'patient_p_sid' => 'p_sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasePatients()
    {
        return $this->hasMany(CasePatient::className(), ['p_pid' => 'p_pid', 'p_sid' => 'p_sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentclass()
    {
        return $this->hasOne(Studentclass::className(), ['studentclass_id' => 'studentclass_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['iddepartment' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['status_id' => 'status_id']);
    }
}
