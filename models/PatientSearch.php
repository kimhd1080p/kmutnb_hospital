<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `app\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_pid', 'p_sid', 'status_id', 'department_id', 'studentclass_id'], 'integer'],
            [['p_name','sex', 'p_surname', 'p_birthday', 'p_address', 'p_tel', 'p_allegy', 'p_disease'], 'safe'],
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
        $query = Patient::find();

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
        $query->joinWith('status')
        ->Where(['p_pid' => $this->p_pid,])
        ->orWhere([ 'p_sid' => $this->p_pid]); //ค้นหา 2 ฟิว

       /* $query->andFilterWhere(['like', 'p_name', $this->p_name])
            ->andFilterWhere(['like', 'p_surname', $this->p_surname])
            ->andFilterWhere(['like', 'p_address', $this->p_address])
            ->andFilterWhere(['like', 'p_tel', $this->p_tel])
            ->andFilterWhere(['like', 'p_allegy', $this->p_allegy])
            ->andFilterWhere(['like', 'p_disease', $this->p_disease]); */

        return $dataProvider;
    }
}
