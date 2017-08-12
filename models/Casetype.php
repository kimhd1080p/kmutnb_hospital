<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "casetype".
 *
 * @property integer $idcasetype
 * @property string $casetype
 *
 * @property CasePatient[] $casePatients
 */
class Casetype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'casetype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['casetype'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcasetype' => 'ID',
            'casetype' => 'ประเภทอาการเจ็บป่วย',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasePatients()
    {
        return $this->hasMany(CasePatient::className(), ['casetype_idcasetype' => 'idcasetype']);
    }
}
