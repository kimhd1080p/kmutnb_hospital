<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Casepatient;

/**
 * CasepatientSearch represents the model behind the search form about `app\models\Casepatient`.
 */
class CasepatientSearch extends Casepatient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcase', 'dispense', 'iddoctor', 'p_pid', 'p_sid', 'nurse_id'], 'integer'],
            [['case_detail', 'timestam', 'idservices', 'casetype_idcasetype'], 'safe'],
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
        $query = Casepatient::find();

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
            //'idcase' => $this->idcase,
            //'timestam' => $this->timestam,
           // 'dispense' => $this->dispense,
            //'idservices' => $this->idservices,
            //'casetype_idcasetype' => $this->casetype_idcasetype,
            //'iddoctor' => $this->iddoctor,
            'p_pid' =>$session['pid'],
           // 'p_sid' => $this->p_sid,
            //'user_id' => $this->user_id,
        ])->andWhere(['p_sid' => $session['sid']]);

        //$query->andFilterWhere(['like', 'case_detail', $this->case_detail]);

        return $dataProvider;
    }
}
