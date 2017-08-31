<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accidenttype".
 *
 * @property integer $idaccidenttype
 * @property string $accidenttype
 *
 * @property Accident[] $accidents
 */
class Accidenttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accidenttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idaccidenttype'], 'required'],
            [['idaccidenttype'], 'integer'],
            [['accidenttype'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idaccidenttype' => 'ID',
            'accidenttype' => 'ลักษณะการบาดเจ็บ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccidents()
    {
        return $this->hasMany(Accident::className(), ['accidenttype_idaccidenttype' => 'idaccidenttype']);
    }
}
