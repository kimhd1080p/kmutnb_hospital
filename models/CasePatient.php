<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "case_patient".
 *
 * @property integer $idcase
 * @property string $case_detail
 * @property string $timestam
 * @property integer $dispense
 * @property integer $casetype_idcasetype
 * @property integer $idservices
 * @property integer $iddoctor
 * @property string $p_pid
 * @property string $p_sid
 * @property integer $user_id
 *
 * @property CaseHasMedicine[] $caseHasMedicines
 * @property Medicine[] $idmedicines
 * @property Casetype $casetypeIdcasetype
 * @property Doctor $iddoctor0
 * @property Patient $pP
 * @property User $user
 * @property Services $idservices0
 */
class CasePatient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'case_patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timestam'], 'safe'],
            [['dispense', 'casetype_idcasetype', 'idservices', 'iddoctor', 'p_pid', 'p_sid', 'user_id'], 'integer'],
            [['casetype_idcasetype', 'idservices', 'iddoctor', 'p_pid', 'p_sid', 'user_id'], 'required'],
            [['case_detail'], 'string', 'max' => 100],
            [['casetype_idcasetype'], 'exist', 'skipOnError' => true, 'targetClass' => Casetype::className(), 'targetAttribute' => ['casetype_idcasetype' => 'idcasetype']],
            [['iddoctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['iddoctor' => 'iddoctor']],
            [['p_pid', 'p_sid'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['p_pid' => 'p_pid', 'p_sid' => 'p_sid']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['idservices'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['idservices' => 'idservices']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcase' => 'IDCASE',
            'case_detail' => 'รายละเอียด',
            'timestam' => 'Timestam',
            'dispense' => 'จ่ายย่า',
            'casetype_idcasetype' => 'ประเภทการเจ็บป่าวย',
            'idservices' => 'บริการที่ได้รับ',
            'iddoctor' => 'แพทผู้ตรวจ',
            'p_pid' => 'รหัสบัตรประจำตัวประชาชน',
            'p_sid' => 'รหัสนักศึกษา',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaseHasMedicines()
    {
        return $this->hasMany(CaseHasMedicine::className(), ['idcase' => 'idcase']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdmedicines()
    {
        return $this->hasMany(Medicine::className(), ['idmedicine' => 'idmedicine'])->viaTable('case_has_medicine', ['idcase' => 'idcase']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasetypeIdcasetype()
    {
        return $this->hasOne(Casetype::className(), ['idcasetype' => 'casetype_idcasetype']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddoctor0()
    {
        return $this->hasOne(Doctor::className(), ['iddoctor' => 'iddoctor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPP()
    {
        return $this->hasOne(Patient::className(), ['p_pid' => 'p_pid', 'p_sid' => 'p_sid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdservices0()
    {
        return $this->hasOne(Services::className(), ['idservices' => 'idservices']);
    }
}
