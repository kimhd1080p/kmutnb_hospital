<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicine".
 *
 * @property string $idmedicine
 * @property integer $idmedicinetype
 * @property string $medicine
 * @property string $properties
 * @property string $howto
 * @property string $note
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
            [['properties'], 'string', 'max' => 70],
            [['howto', 'note'], 'string', 'max' => 45],
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
            'idmedicinetype' => 'ประเภทยา',
            'medicine' => 'ชื่อยา',
            'properties' => 'สรรพคุณยา',
            'howto' => 'วิธีใช้/วิธีรับประทาน',
            'note' => 'หมายเหตุ',
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
