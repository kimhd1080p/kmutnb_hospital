<?php

namespace app\models;
use app\models\Casetype;
use app\models\Services;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "casepatient".
 *
 * @property integer $idcase
 * @property string $case_detail
 * @property string $timestam
 * @property integer $dispense
 * @property integer $idservices
 * @property integer $casetype_idcasetype
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
class Casepatient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'casepatient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timestam','idservices', 'casetype_idcasetype',], 'safe'],
            [['dispense',  'iddoctor', 'p_pid', 'p_sid', 'nurse_id'], 'integer'],
            [['idservices', 'casetype_idcasetype', 'iddoctor', 'p_pid', 'p_sid', 'nurse_id'], 'required'],
            [['case_detail'], 'string',],
           
            [['iddoctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['iddoctor' => 'iddoctor']],
            [['p_pid', 'p_sid'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['p_pid' => 'p_pid', 'p_sid' => 'p_sid']],
            [['nurse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nurse::className(), 'targetAttribute' => ['nurse_id' => 'id']],
            
              
        ];
    }
    
   
    
    public function casetypeToArray()
{
  return $this->casetype_idcasetype = explode(',', $this->casetype_idcasetype);
}
   
    /**
     * @inheritdoc
     */
    public function getCasetypevalue(){
    $casetype = ArrayHelper::map(Casetype::find()->all(),'idcasetype','casetype');
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

public function servicesToArray()
{
  return $this->idservices = explode(',', $this->idservices);
}
   
    /**
     * @inheritdoc
     */
    public function getServicesvalue(){
    $services = ArrayHelper::map(Services::find()->all(),'idservices','services');
    $servicesSelected = explode(',', $this->idservices);
    $servicesSelectedName = [];
    foreach ($services as $key => $servicesName) {
      foreach ($servicesSelected as $servicesKey) {

        if($key === $servicesKey){
          $servicesSelectedName[] = $servicesName;
        }
      }
    }

    return implode(', ', $servicesSelectedName);
}
    public function attributeLabels()
    {
        return [
            'idcase' => 'IDCASE',
            'case_detail' => 'รายละเอียด',
            'timestam' => 'วันที่บันทึก',
            'dispense' => 'จ่ายยา',
            'idservices' => 'บริการที่ได้รับ',
            'casetype_idcasetype' => 'ประเภทอาการเจ็บป่วย',
            'iddoctor' => 'แพทย์ผู้จรวจ',
            'p_pid' => 'รหัสบัตรประชาชน',
            'p_sid' => 'รหัสนักศึกษา',
            'nurse_id' => 'ผู้ให้บริการ',
            'casetypevalue' => 'ประเภทอาการเจ็บป่วย',
            'servicesvalue' => 'บริการที่ได้รับ',
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
   

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['iddoctor' => 'iddoctor']);
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
      
        return $this->hasOne(Nurse::className(), ['id' => 'nurse_id']);;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
}
