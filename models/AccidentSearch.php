<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accident;

/**
 * AccidentSearch represents the model behind the search form about `app\models\Accident`.
 */
class AccidentSearch extends Accident
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idaccident', 'accidenttype_idaccidenttype', 'medicaltreatment_idmedicaltreatment', 'p_pid', 'p_sid', 'nurse_id', 'inlocattype_idinlocattype'], 'integer'],
            [['timestam', 'location', 'note'], 'safe'],
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
        $query = Accident::find();

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
        $query->andFilterWhere([
//            'idaccident' => $this->idaccident,
//            'timestam' => $this->timestam,
//            'accidenttype_idaccidenttype' => $this->accidenttype_idaccidenttype,
//            'medicaltreatment_idmedicaltreatment' => $this->medicaltreatment_idmedicaltreatment,
            'p_pid' => $session['pid'],
//            'p_sid' => $this->p_sid,
//            'user_id' => $this->user_id,
//            'inlocattype_idinlocattype' => $this->inlocattype_idinlocattype,
        ]);

//        $query->andFilterWhere(['like', 'location', $this->location])
//            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
