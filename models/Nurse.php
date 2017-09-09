<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nurse".
 *
 * @property integer $id
 * @property string $name
 * @property integer $usertype_ut_id
 * @property integer $n_status
 *
 * @property Accident[] $accidents
 * @property Appointment[] $appointments
 * @property Casepatient[] $casepatients
 * @property Nursetype $usertypeUt
 */
class Nurse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nurse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usertype_ut_id'], 'required'],
            [['usertype_ut_id', 'n_status'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['usertype_ut_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nursetype::className(), 'targetAttribute' => ['usertype_ut_id' => 'ut_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อ-สกุล',
            'usertype_ut_id' => 'สายงาน',
            'n_status' => 'ใช้งาน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccidents()
    {
        return $this->hasMany(Accident::className(), ['nurse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['nurse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasepatients()
    {
        return $this->hasMany(Casepatient::className(), ['nurse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNursetype()
    {
        return $this->hasOne(Nursetype::className(), ['ut_id' => 'usertype_ut_id']);
    }
}
