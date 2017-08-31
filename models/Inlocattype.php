<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inlocattype".
 *
 * @property integer $idinlocattype
 * @property string $inlocattype
 *
 * @property Accident[] $accidents
 */
class Inlocattype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inlocattype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idinlocattype'], 'required'],
            [['idinlocattype'], 'integer'],
            [['inlocattype'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idinlocattype' => 'ID',
            'inlocattype' => 'ประเภท',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccidents()
    {
        return $this->hasMany(Accident::className(), ['inlocattype_idinlocattype' => 'idinlocattype']);
    }
}
