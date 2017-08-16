<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicinesize".
 *
 * @property integer $id
 * @property string $medicinesize
 *
 * @property Medicine[] $medicines
 */
class Medicinesize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicinesize';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['medicinesize'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'medicinesize' => 'ขนาดยา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicines()
    {
        return $this->hasMany(Medicine::className(), ['medicinesize_id' => 'id']);
    }
}
