<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctortype".
 *
 * @property integer $id
 * @property string $doctortype
 *
 * @property Doctor[] $doctors
 */
class Doctortype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctortype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctortype'], 'required'],
            [['doctortype'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctortype' => 'ประเภท',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['doctortype_id' => 'id']);
    }
}
