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
            [['note'], 'safe'],
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
       $query->joinWith([
    'casepatient' => function (\yii\db\ActiveQuery $query) {
            $session = Yii::$app->session;
        $query->where( ['p_pid' => $session['pid']]);
    }
])->joinWith('medicinepackage')->joinWith('medicine');
        return $dataProvider;
    }
}
