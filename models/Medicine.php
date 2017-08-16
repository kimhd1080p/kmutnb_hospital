<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine".
 *
 * @property string $idmedicine
 * @property string $medicine
 * @property integer $idmedicinetype
 * @property integer $medicinesize_id
 *
 * @property CaseHasMedicine[] $caseHasMedicines
 * @property Medicinesize $medicinesize
 * @property Medicinetype $idmedicinetype0
 * @property Medicinestock[] $medicinestocks
 */
class Medicine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmedicine', 'idmedicinetype', 'medicinesize_id'], 'required'],
            [['idmedicine', 'idmedicinetype', 'medicinesize_id'], 'integer'],
            [['medicine'], 'string', 'max' => 100],
            [['medicinesize_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicinesize::className(), 'targetAttribute' => ['medicinesize_id' => 'id']],
            [['idmedicinetype'], 'exist', 'skipOnError' => true, 'targetClass' => Medicinetype::className(), 'targetAttribute' => ['idmedicinetype' => 'idmedicinetype']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmedicine' => 'รหัสยา',
            'medicine' => 'ชื่อยา',
            'idmedicinetype' => 'ประเภทยา',
            'medicinesize_id' => 'ขนาด',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasemedicines()
    {
        return $this->hasMany(CaseHasMedicine::className(), ['idmedicine' => 'idmedicine']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicinesize()
    {
        return $this->hasOne(Medicinesize::className(), ['id' => 'medicinesize_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicinetype()
    {
        return $this->hasOne(Medicinetype::className(), ['idmedicinetype' => 'idmedicinetype']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicinestocks()
    {
        return $this->hasMany(Medicinestock::className(), ['medicine_idmedicine' => 'idmedicine']);
    }
}
