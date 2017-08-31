<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicaltreatment".
 *
 * @property integer $idmedicaltreatment
 * @property string $medicaltreatment
 *
 * @property Accident[] $accidents
 */
class Medicaltreatment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicaltreatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmedicaltreatment'], 'required'],
            [['idmedicaltreatment'], 'integer'],
            [['medicaltreatment'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmedicaltreatment' => 'ID',
            'medicaltreatment' => 'การรักษาพยาบาล',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccidents()
    {
        return $this->hasMany(Accident::className(), ['medicaltreatment_idmedicaltreatment' => 'idmedicaltreatment']);
    }
}
