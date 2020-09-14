<?php

namespace common\models\admin\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\admin\technical\Metacpa;

/**
 * MetacpaSearch represents the model behind the search form of `\common\models\admin\technical\Metacpa`.
 */
class MetacpaSearch extends Metacpa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['campaign_name', 'clicks', 'leads', 'conversion_rate', 'id_compain'], 'safe'],
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
        $query = Metacpa::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'campaign_name', $this->campaign_name])
            ->andFilterWhere(['like', 'clicks', $this->clicks])
            ->andFilterWhere(['like', 'leads', $this->leads])
            ->andFilterWhere(['like', 'conversion_rate', $this->conversion_rate])
            ->andFilterWhere(['like', 'id_compain', $this->id_compain]);

        return $dataProvider;
    }
}
