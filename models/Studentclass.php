<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "studentclass".
 *
 * @property integer $studentclass_id
 * @property string $studentclass
 *
 * @property Patient[] $patients
 */
class Studentclass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'studentclass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['studentclass'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'studentclass_id' => 'ID',
            'studentclass' => 'ระดับชั้น',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patient::className(), ['studentclass_id' => 'studentclass_id']);
    }
}
