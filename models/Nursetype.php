<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nursetype".
 *
 * @property integer $ut_id
 * @property string $type
 *
 * @property Nurse[] $nurses
 */
class Nursetype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nursetype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ut_id' => 'ID',
            'type' => 'สายงาน

',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
 
     public function getUser()
    {
        return $this->hasMany(User::className(), ['id' => 'ut_id']);
    }
}
