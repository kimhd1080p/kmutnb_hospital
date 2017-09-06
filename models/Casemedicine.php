<?php

namespace app\models;

use Yii;
use app\models\Medicinerecommend;
use app\models\Medicinetime;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "casemedicine".
 *
 * @property integer $ID
 * @property integer $idcase
 * @property string $idmedicine
 * @property integer $medicinepackage_id
 * @property integer $qty
 * @property string $expired_date
 * @property integer $take1
 * @property string $take2
 * @property string $take3
 * @property integer $take4
 * @property string $take5
 * @property integer $take6
 * @property string $take7
 * @property string $take8
 *
 * @property Casepatient $idcase0
 * @property Medicine $idmedicine0
 * @property Medicinepackage $medicinepackage
 */
class Casemedicine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'casemedicine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcase', 'idmedicine', 'medicinepackage_id', 'qty', 'expired_date', 'take1', 'take2', 'take3', 'take4', 'take5', 'take6'], 'required'],
            [['idcase', 'idmedicine', 'medicinepackage_id', 'qty', 'take1', 'take4', 'take6'], 'integer'],
            [['expired_date'], 'safe'],
            [['take2'], 'string', 'max' => 50],
            [['take3', 'take5', 'take7', 'take8'], 'string', 'max' => 45],
            [['idcase'], 'exist', 'skipOnError' => true, 'targetClass' => Casepatient::className(), 'targetAttribute' => ['idcase' => 'idcase']],
            [['idmedicine'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::className(), 'targetAttribute' => ['idmedicine' => 'idmedicine']],
            [['medicinepackage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicinepackage::className(), 'targetAttribute' => ['medicinepackage_id' => 'id']],
        ];
    }

    public function take5ToArray()
{
  return $this->take5 = explode(',', $this->take5);
}
public function take8ToArray()
{
  return $this->take8 = explode(',', $this->take8);
}

public function getTake5value(){
    $take5 = ArrayHelper::map(Medicinetime::find()->all(),'idmedicinetime','medicinetime');
    $take5Selected = explode(',', $this->take5);
    $take5SelectedName = [];
    foreach ($take5 as $key => $take5Name) {
      foreach ($take5Selected as $take5Key) {

        if($key === (int)$take5Key){
          $take5SelectedName[] = $take5Name;
        }
      }
    }

    return implode(', ', $take5SelectedName);
}

public function getTake8value(){
    $take8 = ArrayHelper::map(Medicinerecommend::find()->all(),'idmedicinerecommend','medicinerecommend');
    $take8Selected = explode(',', $this->take8);
    $take8SelectedName = [];
    foreach ($take8 as $key => $take8Name) {
      foreach ($take8Selected as $take8Key) {

        if($key === (int)$take8Key){
          $take8SelectedName[] = $take8Name;
        }
      }
    }

    return implode(', ', $take8SelectedName);
}
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'idcase' => 'CASE',
            'idmedicine' => 'ยา',
            'medicinepackage_id' => 'บรรจุภัณฑ์',
            'qty' => 'จำนวน',
            'expired_date' => 'วันหมดอายุ',
            'take1' => 'วิธีใช้',
            'take2' => 'ครั้งละ/เม็ด',
            'take3' => 'วันละ/ครั้ง',
            'take4' => 'ก่อนหรือหลังอาาหาร',
            'take5' => 'เวลา',
            'take6' => 'ทุก/ชั่วโมง',
            'take7' => 'หรือเมื่อ',
            'take8' => 'คำแนะนำ',
            'take8value' => 'คำแนะนำ',
            'take5value' => 'เวลา',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasepatient()
    {
        return $this->hasOne(Casepatient::className(), ['idcase' => 'idcase']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicine()
    {
        return $this->hasOne(Medicine::className(), ['idmedicine' => 'idmedicine']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicinepackage()
    {
        return $this->hasOne(Medicinepackage::className(), ['id' => 'medicinepackage_id']);
    }
}
