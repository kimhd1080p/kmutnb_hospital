<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicinetime".
 *
 * @property integer $idmedicinetime
 * @property string $medicinetime
 */
class Medicinetime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicinetime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['medicinetime'], 'required'],
            [['medicinetime'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmedicinetime' => 'Idmedicinetime',
            'medicinetime' => 'Medicinetime',
        ];
    }
}
