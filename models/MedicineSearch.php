<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medicine;

/**
 * MedicineSearch represents the model behind the search form about `app\models\Medicine`.
 */
class MedicineSearch extends Medicine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmedicine', 'idmedicinetype'], 'integer'],
            [['medicine', 'medicinesize'], 'safe'],
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
        $query = Medicine::find();

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
            'idmedicine' => $this->idmedicine,
            'idmedicinetype' => $this->idmedicinetype,
        ]);

        $query->andFilterWhere(['like', 'medicine', $this->medicine])
            ->andFilterWhere(['like', 'medicinesize', $this->medicinesize]);

        return $dataProvider;
    }
}
