<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine".
 *
 * @property string $idmedicine
 * @property string $medicine
 * @property integer $idmedicinetype
 * @property string $medicinesize
 *
 * @property Casemedicine[] $casemedicines
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
            [['idmedicine', 'idmedicinetype'], 'required'],
            [['idmedicine', 'idmedicinetype'], 'integer'],
            [['medicine'], 'string', 'max' => 100],
            [['medicinesize'], 'string', 'max' => 10],
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
            'medicinesize' => 'ขนาด',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasemedicines()
    {
        return $this->hasMany(Casemedicine::className(), ['idmedicine' => 'idmedicine']);
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
