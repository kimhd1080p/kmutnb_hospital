<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $iddoctor
 * @property string $doctor
 *
 * @property CasePatient[] $casePatients
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
            [['doctor'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasePatients()
    {
        return $this->hasMany(CasePatient::className(), ['iddoctor' => 'iddoctor']);
    }
}
