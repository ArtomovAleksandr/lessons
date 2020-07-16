<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderModel;

/**
 * SearchOrderModel represents the model behind the search form of `common\models\OrderModel`.
 */
class SearchOrderModel extends OrderModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'done', 'countgoods'], 'integer'],
            [['create_date', 'name', 'fone', 'description', 'totalorder'], 'safe'],
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
        $query = OrderModel::find();

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
            'done' => $this->done,
            'countgoods' => $this->countgoods,
        ]);

        $query->andFilterWhere(['like', 'create_date', $this->create_date])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'fone', $this->fone])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'totalorder', $this->totalorder]);

        return $dataProvider;
    }
}
