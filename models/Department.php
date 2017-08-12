<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $iddepartment
 * @property string $department_id
 * @property string $department_name2
 * @property integer $idfaculty
 *
 * @property Faculty $idfaculty0
 * @property Patient[] $patients
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfaculty'], 'required'],
            [['idfaculty'], 'integer'],
            [['department_id'], 'string', 'max' => 45],
            [['department_name2'], 'string', 'max' => 10],
            [['idfaculty'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['idfaculty' => 'idfaculty']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddepartment' => 'ID',
            'department_id' => 'ภาควิชา',
            'department_name2' => 'Department Name2',
            'idfaculty' => 'Idfaculty',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdfaculty0()
    {
        return $this->hasOne(Faculty::className(), ['idfaculty' => 'idfaculty']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patient::className(), ['department_id' => 'iddepartment']);
    }
}
