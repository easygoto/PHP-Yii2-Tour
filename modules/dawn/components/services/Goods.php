<?php


namespace app\modules\dawn\components\services;

use app\components\BaseService;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\models\Goods as GoodsModel;
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

    public function listsNotDelete(array $keywords)
    {
        $keywords['is_delete'] = Constant::NOT_DELETE;
        return $this->lists($keywords, function (GoodsModel $item) {
            return $item->getAttributes();
        });
    }

    public function getNotDelete(int $id)
    {
        $result = $this->get($id, function (GoodsModel $item) {
            return $item->getAttributes(null, ['is_delete']);
        }, function (ActiveQuery $query) {
            return $query->andFilterWhere(['is_delete' => Constant::NOT_DELETE]);
        });
        return $result;
    }

    public function delete($id, $params = [])
    {
        $params = ['is_delete' => Constant::NOT_DELETE];
        return parent::delete($id, $params);
    }
}
