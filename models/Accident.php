<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accident".
 *
 * @property integer $idaccident
 * @property string $timestam
 * @property string $location
 * @property string $note
 * @property integer $accidenttype_idaccidenttype
 * @property integer $medicaltreatment_idmedicaltreatment
 * @property string $p_pid
 * @property string $p_sid
 * @property integer $user_id
 * @property integer $inlocattype_idinlocattype
 *
 * @property Accidenttype $accidenttypeIdaccidenttype
 * @property Inlocattype $inlocattypeIdinlocattype
 * @property Medicaltreatment $medicaltreatmentIdmedicaltreatment
 * @property Patient $pP
 * @property User $user
 */
class Accident extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accident';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timestam'], 'safe'],
            [['accidenttype_idaccidenttype', 'medicaltreatment_idmedicaltreatment', 'p_pid', 'p_sid', 'nurse_id', 'inlocattype_idinlocattype'], 'required'],
            [['accidenttype_idaccidenttype', 'medicaltreatment_idmedicaltreatment', 'p_pid', 'p_sid', 'nurse_id', 'inlocattype_idinlocattype'], 'integer'],
            [['location', 'note'], 'string', 'max' => 250],
            [['accidenttype_idaccidenttype'], 'exist', 'skipOnError' => true, 'targetClass' => Accidenttype::className(), 'targetAttribute' => ['accidenttype_idaccidenttype' => 'idaccidenttype']],
            [['inlocattype_idinlocattype'], 'exist', 'skipOnError' => true, 'targetClass' => Inlocattype::className(), 'targetAttribute' => ['inlocattype_idinlocattype' => 'idinlocattype']],
            [['medicaltreatment_idmedicaltreatment'], 'exist', 'skipOnError' => true, 'targetClass' => Medicaltreatment::className(), 'targetAttribute' => ['medicaltreatment_idmedicaltreatment' => 'idmedicaltreatment']],
            [['p_pid', 'p_sid'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['p_pid' => 'p_pid', 'p_sid' => 'p_sid']],
            [['nurse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nurse::className(), 'targetAttribute' => ['nurse_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idaccident' => 'ID',
            'timestam' => 'วันที่',
            'location' => 'สถานที่เกิด',
            'note' => 'หมายเหตุ',
            'accidenttype_idaccidenttype' => 'ลักษณะการบาดเจ็บ',
            'medicaltreatment_idmedicaltreatment' => 'การรักษาพยาบาล',
            'p_pid' => 'รหัสบัตรประชาชน',
            'p_sid' => 'รหัสนักศึกษา',
            'nurse_id' => 'ผู้ให้บริการ',
            'inlocattype_idinlocattype' => 'ประเภท',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccidenttype()
    {
        return $this->hasOne(Accidenttype::className(), ['idaccidenttype' => 'accidenttype_idaccidenttype']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInlocattype()
    {
        return $this->hasOne(Inlocattype::className(), ['idinlocattype' => 'inlocattype_idinlocattype']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicaltreatment()
    {
        return $this->hasOne(Medicaltreatment::className(), ['idmedicaltreatment' => 'medicaltreatment_idmedicaltreatment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['p_pid' => 'p_pid', 'p_sid' => 'p_sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNurse()
    {
        return $this->hasOne(Nurse::className(), ['id' => 'nurse_id']);
    }
}
