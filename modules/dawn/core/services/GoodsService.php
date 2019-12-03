<?php


namespace app\modules\dawn\core\services;

use app\core\components\BaseService;
use app\core\helpers\FilterHandler;
use app\modules\dawn\core\containers\Constant;
use app\modules\dawn\models\Goods;
use yii\db\ActiveQuery;

class GoodsService extends BaseService
{
    protected function handleFilter(ActiveQuery $query, array $keywords = []): ActiveQuery
    {
        $query = (new FilterHandler)
            ->setKeywords($keywords)
            ->setLike(['name'])
            ->setEquals(['id', 'status', 'is_delete'])
            ->addRange(['created_at', 'updated_at', 'operated_at'])
            ->addRange(['selling_price', 'market_price', 'wholesale', 'inventory'])
            ->buildQuery($query);
        return $query;
    }

    protected function handleResult(Goods $item, $scope = 'list')
    {
        switch ($scope) {
            default:
            case 'list':
            case 'detail':
                return $item->getAttributes(null, ['is_delete', 'created_at']);
        }
    }

    public function listsNotDelete(array $keywords)
    {
        return $this->listsByAttr($keywords, function (ActiveQuery $query, array $keywords = []) {
            $keywords['is_delete'] = Constant::NOT_DELETE;
            return $this->handleFilter($query, $keywords);
        }, fn (Goods $item) => $this->handleResult($item, 'list'));
    }

    public function getNotDelete(int $id)
    {
        return $this->getByAttr(
            fn (Goods $item) => $this->handleResult($item, 'detail'),
            fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id, 'is_delete' => Constant::NOT_DELETE])
        );
    }

    public function delete($id, $params = [])
    {
        $params = ['is_delete' => Constant::NOT_DELETE];
        return parent::delete($id, $params);
    }
}
