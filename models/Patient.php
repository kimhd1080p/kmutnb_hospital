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
 * @property string $sex
 * @property string $p_birthday
 * @property string $p_address
 * @property string $p_tel
 * @property string $p_allegy
 * @property string $p_disease
 * @property string $documentindex
 * @property string $department_id
 * @property integer $studentclass_id
 * @property integer $status_id
 */
class Patient extends \yii\db\ActiveRecord
{
    public  $ps;
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
            [['p_pid', 'p_sid'], 'required'],
            [['p_pid', 'p_sid', 'studentclass_id', 'status_id'], 'integer'],
            [['p_birthday','ps'], 'safe'],
            [['p_name', 'p_surname', 'documentindex'], 'string', 'max' => 45],
            [['sex'], 'string', 'max' => 10],
            [['p_address', 'p_allegy', 'p_disease'], 'string', 'max' => 100],
            [['p_tel'], 'string', 'max' => 15],
            [['department_id'], 'string', 'max' => 11],
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
             'student' => 'รหัสนักศึกษา',
            'p_name' => 'ชื่อ',
            'p_surname' => 'นามสกุล',
            'sex' => 'เพศ',
            'p_birthday' => 'วันเกิด',
             'age' => 'อายุ',
            'p_address' => 'ที่อยู่',
            'p_tel' => 'เบอร์โทร',
            'p_allegy' => 'ประวัติแพ้ยา',
            'p_disease' => 'โรคประจำตัว',
            'documentindex' => 'ที่เก็บเอกสาร',
            'department_id' => 'ภาควิชา/ส่วนงาน',
            'studentclass_id' => 'ระดับชั้น',
            'class' => 'ระดับชั้น',
            'status_id' => 'สถานภาพ',
        ];
    }
    
    public function getStudent()
                {
                 if($this->p_pid == $this->p_sid)
                    {
                        return false;
                    }
                    else
                    {
                         return $this->p_sid; 
                    }
                  }
                  public function getClass()
                {
                 if($this->studentclass_id == null)
                    {
                        return false;
                    }
                    else
                    {
                         return $this->studentclass->studentclass; 
                    }
                  }
                  public function getAge()
                {
                       $dob=$this->p_birthday;
    $diff = (date('Y') - date('Y',strtotime($dob)));
                  
                   
                         return $diff; 
                    
                  }
    
        public function getAccidents()
    {
        return $this->hasMany(Accident::className(), ['p_pid' => 'p_pid', 'p_sid' => 'p_sid']);
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
    public function getCasepatients()
    {
        return $this->hasMany(Casepatient::className(), ['p_pid' => 'p_pid', 'p_sid' => 'p_sid']);
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
