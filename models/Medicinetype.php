<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicinetype".
 *
 * @property integer $idmedicinetype
 * @property string $medicinetype
 *
 * @property Medicine[] $medicines
 */
class Medicinetype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicinetype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['medicinetype'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmedicinetype' => 'ID',
            'medicinetype' => 'ประเภทยา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicines()
    {
        return $this->hasMany(Medicine::className(), ['idmedicinetype' => 'idmedicinetype']);
    }
}
