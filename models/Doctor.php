<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $iddoctor
 * @property string $doctor
 * @property integer $doctortype_id
 *
 * @property Appointment[] $appointments
 * @property Casepatient[] $casepatients
 * @property Doctortype $doctortype
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctortype_id'], 'required'],
            [['doctortype_id'], 'integer'],
            [['doctor'], 'string', 'max' => 45],
            [['doctortype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctortype::className(), 'targetAttribute' => ['doctortype_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddoctor' => 'ID',
            'doctor' => 'แพทย์ผู้ตรวจ',
            'doctortype_id' => 'ประเภท',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['doctor_iddoctor' => 'iddoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasepatients()
    {
        return $this->hasMany(Casepatient::className(), ['iddoctor' => 'iddoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctortype()
    {
        return $this->hasOne(Doctortype::className(), ['id' => 'doctortype_id']);
    }
}
