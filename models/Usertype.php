<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usertype".
 *
 * @property integer $ut_id
 * @property string $type
 *
 * @property User[] $users
 */
class Usertype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usertype';
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
            'type' => 'ตำแหน่ง

',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['userType_ut_id' => 'ut_id']);
    }
}
