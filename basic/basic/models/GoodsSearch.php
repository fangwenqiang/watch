<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `app\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['g_id', 'gt_id', 'click_count', 'brand_id', 'g_number', 'market_price', 'shop_price', 'is_show', 'is_recommend', 'is_promote', 'promote_price'], 'integer'],
            [['goods_sn', 'goods_name', 'g_weight', 'keywords', 'describe', 'g_img', 'g_thumb', 'promote_start_date', 'promote_end_date', 'author', 'add_time'], 'safe'],
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
        $query = Goods::find();

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
            'g_id' => $this->g_id,
            'gt_id' => $this->gt_id,
            'click_count' => $this->click_count,
            'brand_id' => $this->brand_id,
            'g_number' => $this->g_number,
            'market_price' => $this->market_price,
            'shop_price' => $this->shop_price,
            'is_show' => $this->is_show,
            'is_recommend' => $this->is_recommend,
            'is_promote' => $this->is_promote,
            'promote_price' => $this->promote_price,
        ]);

        $query->andFilterWhere(['like', 'goods_sn', $this->goods_sn])
            ->andFilterWhere(['like', 'goods_name', $this->goods_name])
            ->andFilterWhere(['like', 'g_weight', $this->g_weight])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'describe', $this->describe])
            ->andFilterWhere(['like', 'g_img', $this->g_img])
            ->andFilterWhere(['like', 'g_thumb', $this->g_thumb])
            ->andFilterWhere(['like', 'promote_start_date', $this->promote_start_date])
            ->andFilterWhere(['like', 'promote_end_date', $this->promote_end_date])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'add_time', $this->add_time]);

        return $dataProvider;
    }
}
