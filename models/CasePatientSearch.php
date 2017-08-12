<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CasePatient;

/**
 * CasePatientSearch represents the model behind the search form about `app\models\CasePatient`.
 */
class CasePatientSearch extends CasePatient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcase', 'dispense', 'casetype_idcasetype', 'idservices', 'iddoctor', 'p_pid', 'p_sid', 'user_id'], 'integer'],
            [['case_detail', 'timestam'], 'safe'],
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
        $query = CasePatient::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'idcase' => $this->idcase,
            'timestam' => $this->timestam,
            'dispense' => $this->dispense,
            'casetype_idcasetype' => $this->casetype_idcasetype,
            'idservices' => $this->idservices,
            'iddoctor' => $this->iddoctor,
            'p_pid' => $this->p_pid,
            'p_sid' => $this->p_sid,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'case_detail', $this->case_detail]);

        return $dataProvider;
    }
}
