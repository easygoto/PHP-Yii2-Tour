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
            case 'all':
            case 'list':
            case 'detail':
                return $item->getAttributes(null, ['is_delete', 'created_at']);
        }
    }

    public function allNotDelete(array $keywords = [])
    {
        $keywords['is_delete'] = Constant::NOT_DELETE;
        return $this->allByAttr(
            $keywords,
            fn (ActiveQuery $query) => $this->handleFilter($query, $keywords),
            fn (Goods $item) => $this->handleResult($item, 'all')
        );
    }

    public function listsNotDelete(array $keywords = [])
    {
        $keywords['is_delete'] = Constant::NOT_DELETE;
        return $this->listsByAttr(
            $keywords,
            fn (ActiveQuery $query) => $this->handleFilter($query, $keywords),
            fn (Goods $item) => $this->handleResult($item, 'list')
        );
    }

    public function existsByIdNotDelete(int $id)
    {
        return $this->existsByAttr(fn (ActiveQuery $query) => $query->andFilterWhere([
            'id'        => $id,
            'is_delete' => Constant::NOT_DELETE,
        ]));
    }

    public function getByIdNotDelete(int $id)
    {
        return $this->getByAttr(
            fn (ActiveQuery $query) => $query->andFilterWhere([
                'id'        => $id,
                'is_delete' => Constant::NOT_DELETE,
            ]),
            fn (Goods $item) => $this->handleResult($item, 'detail')
        );
    }

    public function editOneById(int $id, array $params)
    {
        return $this->editOneByAttr($params, fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }

    public function removeById(int $id)
    {
        return $this->editOneByAttr([]);
    }

    public function deleteOneById(int $id)
    {
        return $this->deleteOneByAttr(fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }
}
