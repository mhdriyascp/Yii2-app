<?php

namespace common\models\searchmodels;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\basemodels\Univercity;

/**
 * UnivercitySearch represents the model behind the search form of `common\models\basemodels\Univercity`.
 */
class UnivercitySearch extends Univercity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['univercity_id', 'created_by', 'created_at', 'updated_at', 'status'], 'integer'],
            [['univercity_name', 'univercity_description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Univercity::find();

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
            'univercity_id' => $this->univercity_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'univercity_name', $this->univercity_name])
            ->andFilterWhere(['like', 'univercity_description', $this->univercity_description]);

        return $dataProvider;
    }
}
