<?php

namespace common\models;

use common\models\GoodsModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * GoodsSearchModel represents the model behind the search form of `common\models\GoodsModel`.
 */
class GoodsSearchModel extends GoodsModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'unit_id', 'currency_id', 'factory_id', 'category_id', 'countprice', 'max_order'], 'integer'],
            [['num', 'catalog', 'mark', 'name', 'inprice', 'addition', 'outprice'], 'safe'],
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
    public function searchArchive($params, $goodsArchive)
    {
        $query = GoodsModel::find()->andFilterWhere(['archive' => $goodsArchive]);
    //    $query = GoodsModel::find()->where(['archive' => $goodsArchive])->all();
  //      $query ->andFilterWhere(['archive' => GoodsModel::NOARCHIVE]);
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
            'unit_id' => $this->unit_id,
            'currency_id' => $this->currency_id,
            'factory_id' => $this->factory_id,
            'category_id' => $this->category_id,
            'countprice' => $this->countprice,
            'max_order' => $this->max_order,
        ]);

        $query->andFilterWhere(['like', 'num', $this->num])
            ->andFilterWhere(['like', 'catalog', $this->catalog])
            ->andFilterWhere(['like', 'mark', $this->mark])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inprice', $this->inprice])
            ->andFilterWhere(['like', 'addition', $this->addition])
            ->andFilterWhere(['like', 'outprice', $this->outprice]);

        return $dataProvider;
    }
}
