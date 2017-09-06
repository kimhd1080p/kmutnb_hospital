<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medicinerecommend".
 *
 * @property integer $idmedicinerecommend
 * @property string $medicinerecommend
 */
class Medicinerecommend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicinerecommend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['medicinerecommend'], 'required'],
            [['medicinerecommend'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idmedicinerecommend' => 'Idmedicinerecommend',
            'medicinerecommend' => 'Medicinerecommend',
        ];
    }
}
