<?php


namespace app\modules\dawn\core\services;

use app\core\components\BaseService;
use app\modules\dawn\models\Menu;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class MenuService extends BaseService
{
    public function all(array $keywords = [])
    {
        return $this->allByAttr(
            $keywords,
            fn (ActiveQuery $query) => $this->handleFilter($query, $keywords),
            fn (Menu $item) => $this->handleResult($item, 'all')
        );
    }

    public function lists(array $keywords = [])
    {
        return $this->listsByAttr(
            $keywords,
            fn (ActiveQuery $query) => $this->handleFilter($query, $keywords),
            fn (Menu $item) => $this->handleResult($item, 'list')
        );
    }

    public function existsByIdNotDelete(int $id)
    {
        return $this->existsByAttr(fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }

    public function getById(int $id)
    {
        return $this->getByAttr(
            fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]),
            fn (Menu $item) => $this->handleResult($item, 'detail')
        );
    }

    public function addOne(array $params)
    {
        $params['status'] = ArrayHelper::getValue($params, 'status', Menu::STATUS['NORMAL']);
        return parent::addOne($params);
    }

    public function editOneById(int $id, array $params)
    {
        return $this->editOneByAttr($params, fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }

    public function enableById(int $id)
    {
        return $this->editOneByAttr([
            'status' => Menu::STATUS['NORMAL'],
        ], fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }

    public function disableById(int $id)
    {
        return $this->editOneByAttr([
            'status' => Menu::STATUS['DISABLE'],
        ], fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }

    public function deleteOneById(int $id)
    {
        return $this->deleteOneByAttr(fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }
}
