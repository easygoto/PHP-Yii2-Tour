<?php

namespace app\modules\api\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

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
            [['id', 'inventory', 'status', 'is_delete'], 'integer'],
            [['name', 'created_at', 'updated_at', 'operated_at'], 'safe'],
            [['wholesale', 'selling_price', 'market_price'], 'number'],
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
            'id' => $this->id,
            'wholesale' => $this->wholesale,
            'selling_price' => $this->selling_price,
            'market_price' => $this->market_price,
            'inventory' => $this->inventory,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'operated_at' => $this->operated_at,
            'status' => $this->status,
            'is_delete' => $this->is_delete,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
