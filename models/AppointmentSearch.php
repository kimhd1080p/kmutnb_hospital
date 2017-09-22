<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appointment;

/**
 * AppointmentSearch represents the model behind the search form about `app\models\Appointment`.
 */
class AppointmentSearch extends Appointment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'medical_certificate', 'todoctor', 'nurse_id', 'nurse_id2', 'patient_p_pid', 'patient_p_sid', 'doctor_iddoctor','todoctor'], 'integer'],
            [['appointment_time', 'timestam', 'detial', 'casetype_idcasetype'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Appointment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
 $session = Yii::$app->session; //open session
        // grid filtering conditions
        $query->joinWith('doctor')->Where([
            //'ID' => $this->ID,
            //'appointment_time' => $this->appointment_time,
            //'medical_certificate' => $this->medical_certificate,
            //'todoctor' => $this->todoctor,
            //'timestam' => $this->timestam,
            //'user_id' => $this->user_id,
            //'user_id2' => $this->user_id2,
            'patient_p_pid' => $session['pid'],
            //'patient_p_sid' => $this->patient_p_sid,
            //'casetype_idcasetype' => $this->casetype_idcasetype,
            //'doctor_iddoctor' => $this->doctor_iddoctor,
        ]);

        $query->andFilterWhere(['like', 'detial', $this->detial]);

        return $dataProvider;
    }
}
