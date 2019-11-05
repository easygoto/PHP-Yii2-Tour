<?php


namespace app\modules\dawn\core\services;

use app\core\components\BaseService;
use app\modules\dawn\core\containers\Constant;
use app\modules\dawn\models\Goods as GoodsModel;
use yii\db\ActiveQuery;

class Goods extends BaseService
{
    public function listsNotDelete(array $keywords)
    {
        $keywords['is_delete'] = Constant::NOT_DELETE;
        return $this->lists($keywords, function (GoodsModel $item) {
            return $item->getAttributes();
        }, function (ActiveQuery $query) {
            return $query->andFilterWhere([
                'id' => $keywords['id'] ?? null,
                'wholesale' => $keywords['wholesale'] ?? null,
                'selling_price' => $keywords['sellingPrice'] ?? null,
                'market_price' => $keywords['marketPrice'] ?? null,
                'inventory' => $keywords['inventory'] ?? null,
                'created_at' => $keywords['createdAt'] ?? null,
                'updated_at' => $keywords['updatedAt'] ?? null,
                'operated_at' => $keywords['operatedAt'] ?? null,
                'status' => $keywords['status'] ?? null,
                'is_delete' => Constant::NOT_DELETE,
            ])->andFilterWhere(['like', 'name', $keywords['name'] ?? null]);
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
