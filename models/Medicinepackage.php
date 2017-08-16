<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicinepackage".
 *
 * @property integer $id
 * @property string $package
 *
 * @property Casemedicine[] $casemedicines
 * @property Medicinestock[] $medicinestocks
 */
class Medicinepackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicinepackage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package' => 'บรรจุภัณฑ์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasemedicines()
    {
        return $this->hasMany(Casemedicine::className(), ['medicinepackage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicinestocks()
    {
        return $this->hasMany(Medicinestock::className(), ['medicinepackage_id' => 'id']);
    }
}
