<?php


namespace app\modules\dawn\components\services;

use app\components\BaseService;
use yii\db\ActiveQuery;

class Goods extends BaseService
{
    protected $modelClass = \app\modules\dawn\models\Goods::class;

    protected function handleFilter(ActiveQuery $query, $keywords): ActiveQuery
    {
        $query->andFilterWhere([
            'id'            => $keywords['id'] ?? null,
            'wholesale'     => $keywords['wholesale'] ?? null,
            'selling_price' => $keywords['selling_price'] ?? null,
            'market_price'  => $keywords['market_price'] ?? null,
            'inventory'     => $keywords['inventory'] ?? null,
            'created_at'    => $keywords['created_at'] ?? null,
            'updated_at'    => $keywords['updated_at'] ?? null,
            'operated_at'   => $keywords['operated_at'] ?? null,
            'status'        => $keywords['status'] ?? null,
            'is_delete'     => $keywords['is_delete'] ?? null,
        ]);
        $query->andFilterWhere(['like', 'name', $keywords['name'] ?? null]);
        return $query;
    }

    public function lists($keywords, $include = null, $exclude = [])
    {
        $keywords['is_delete'] = 0;
        return parent::lists($keywords, $include, $exclude);
    }

    public function get($id, $params = [], $include = null, $exclude = [])
    {
        $params = ['is_delete' => 0];
        $exclude = ['is_delete'];
        return parent::get($id, $params, $include, $exclude);
    }

    public function del($id, $params = [])
    {
        $params = ['is_delete' => 0];
        return parent::del($id, $params);
    }
}
