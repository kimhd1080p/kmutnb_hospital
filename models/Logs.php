<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property integer $id
 * @property string $type
 * @property string $action
 * @property string $id_user
 * @property string $old_data
 * @property string $new_data
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'action', 'old_data', 'new_data'], 'string', 'max' => 255],
            [['id_user'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'action' => 'Action',
            'id_user' => 'Id User',
            'old_data' => 'Old Data',
            'new_data' => 'New Data',
        ];
    }
}
