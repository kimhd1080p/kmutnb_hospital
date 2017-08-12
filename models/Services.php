<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $idservices
 * @property string $services
 *
 * @property CasePatient[] $casePatients
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['services'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idservices' => 'ID',
            'services' => 'บริการที่ได้รับ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasePatients()
    {
        return $this->hasMany(CasePatient::className(), ['idservices' => 'idservices']);
    }
}
