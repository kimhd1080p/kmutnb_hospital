<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "casemedicine".
 *
 * @property integer $ID
 * @property integer $idcase
 * @property string $idmedicine
 * @property integer $medicinepackage_id
 * @property integer $qty
 * @property string $expired_date
 * @property string $properties
 * @property string $howto
 * @property string $note
 *
 * @property Casepatient $idcase0
 * @property Medicine $idmedicine0
 * @property Medicinepackage $medicinepackage
 */
class Casemedicine extends \yii\db\ActiveRecord
{
     public $medicinesearch;
     public $medicinename;
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
            [['idcase', 'idmedicine', 'medicinepackage_id', 'qty'], 'required'],
            [['idcase', 'idmedicine', 'medicinepackage_id', 'qty','medicinesearch'], 'integer'],
            [['expired_date','medicinesearch','medicinename'], 'safe'],
            [['properties'], 'string', 'max' => 70],
            [['howto', 'note'], 'string', 'max' => 45],
            [['idcase'], 'exist', 'skipOnError' => true, 'targetClass' => Casepatient::className(), 'targetAttribute' => ['idcase' => 'idcase']],
            [['idmedicine'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::className(), 'targetAttribute' => ['idmedicine' => 'idmedicine']],
            [['medicinepackage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicinepackage::className(), 'targetAttribute' => ['medicinepackage_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'idcase' => 'IDCASE',
            'idmedicine' => 'ยา',
            'medicinepackage_id' => 'บรรจุภัณฑ์',
            'qty' => 'จำนวน',
            'expired_date' => 'วันหมดอายุ',
            'properties' => 'สรรพคุณยา',
            'howto' => 'วิธีใช้/วิธีรับประทาน',
            'note' => 'หมายเหตุ',
            'medicinesearch' => 'รหัสยา',
            'medicinename' => 'ชื่อยา',
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
