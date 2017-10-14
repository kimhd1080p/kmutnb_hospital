<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `app\models\Patient`.
 */
class PatientSearch2 extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_pid', 'p_sid', 'status_id', 'department_id', 'studentclass_id'], 'integer'],
            [['p_name', 'p_surname', 'sex', 'p_birthday', 'p_address', 'p_tel', 'p_allegy', 'p_disease', 'documentindex','ps'], 'safe'],
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
        // 
          $query->joinWith('status')
        ->Where(['p_pid' => $this->ps,])
        ->orWhere([ 'p_sid' => $this->ps]) 
         ->orWhere([ 'p_name' => $this->ps])
          ->orWhere([ 'p_surname' => $this->ps]); //ค้นหาหลายฟิว
//        $query->andFilterWhere([
//            'p_pid' => $this->ps,
//          'p_sid' => $this->ps,
//         
//     ]);
////
//    $query->Whree(['like', 'p_name', $this->ps])
//        ->orWhree(['like', 'p_surname', $this->ps]);
            

        return $dataProvider;
    }
}
