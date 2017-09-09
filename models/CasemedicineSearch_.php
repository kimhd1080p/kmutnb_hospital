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
            [['ID', 'idcase', 'idmedicine', 'medicinepackage_id', 'qty', 'take1', 'take4', 'take6'], 'integer'],
            [['expired_date', 'take2', 'take3', 'take5', 'take7', 'take8'], 'safe'],
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

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'idcase' => $this->idcase,
            'idmedicine' => $this->idmedicine,
            'medicinepackage_id' => $this->medicinepackage_id,
            'qty' => $this->qty,
            'expired_date' => $this->expired_date,
            'take1' => $this->take1,
            'take4' => $this->take4,
            'take6' => $this->take6,
        ]);

        $query->andFilterWhere(['like', 'take2', $this->take2])
            ->andFilterWhere(['like', 'take3', $this->take3])
            ->andFilterWhere(['like', 'take5', $this->take5])
            ->andFilterWhere(['like', 'take7', $this->take7])
            ->andFilterWhere(['like', 'take8', $this->take8]);

        return $dataProvider;
    }
}
