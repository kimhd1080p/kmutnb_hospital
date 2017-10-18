<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Casemedicine;

/**
 * CasemedicineSearch represents the model behind the search form about `app\models\Casemedicine`.
 */
class CasemedicineSearch extends Casemedicine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'idcase', 'idmedicine', 'medicinepackage_id', 'qty'], 'integer'],
            [['expired_date', 'properties', 'howto', 'note','medicinesearch'], 'safe'],
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
        $query = Casemedicine::find();

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
 $session = Yii::$app->session;
        // grid filtering conditions
        $query->joinWith('casepatient')->Where([
            //'ID' => $this->ID,
            //'appointment_time' => $this->appointment_time,
            //'medical_certificate' => $this->medical_certificate,
            //'todoctor' => $this->todoctor,
            //'timestam' => $this->timestam,
            //'user_id' => $this->user_id,
            //'user_id2' => $this->user_id2,
            'p_pid' => $session['pid'],
            //'patient_p_sid' => $this->patient_p_sid,
            //'casetype_idcasetype' => $this->casetype_idcasetype,
            //'doctor_iddoctor' => $this->doctor_iddoctor,
        ]);
        
//        andFilterWhere([
//            'ID' => $this->ID,
//            'idcase' => $this->idcase,
//            'idmedicine' => $this->idmedicine,
//            'medicinepackage_id' => $this->medicinepackage_id,
//            'qty' => $this->qty,
//            'expired_date' => $this->expired_date,
//        ])->orderBy(['idcase' => SORT_DESC]);
//
//        $query->andFilterWhere(['like', 'properties', $this->properties])
//            ->andFilterWhere(['like', 'howto', $this->howto])
//            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
