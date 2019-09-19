<?php


namespace app\modules\dawn\components\services;

use app\components\BaseService;
use app\modules\dawn\models;
use yii\db\ActiveQuery;

class Goods extends BaseService
{
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

    public function listsNotDelete($keywords)
    {
        $keywords['is_delete'] = 0;
        return $this->lists($keywords, function (models\Goods $item) {
            return $item->getAttributes();
        });
    }

    public function getNotDelete(int $id)
    {
        return $this->get($id, function (models\Goods $item) {
            return $item->getAttributes(null, ['is_delete']);
        }, function (ActiveQuery $query) {
            return $query->andFilterWhere(['is_delete' => 0]);
        });
    }

    public function del($id, $params = [])
    {
        $params = ['is_delete' => 0];
        return parent::del($id, $params);
    }
}
