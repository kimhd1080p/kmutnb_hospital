<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $status_id
 * @property string $status
 *
 * @property Patient[] $patients
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'ID',
            'status' => 'สถานภาพ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patient::className(), ['status_id' => 'status_id']);
    }
}
