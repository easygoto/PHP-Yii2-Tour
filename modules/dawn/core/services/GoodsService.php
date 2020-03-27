<?php

namespace app\modules\dawn\core\services;

use app\core\components\BaseService;
use app\modules\dawn\core\containers\Constant;
use app\modules\dawn\models\Goods;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class GoodsService extends BaseService
{
    public function allNotDelete(array $keywords = [])
    {
        $keywords['is_delete'] = Constant::NOT_DELETE;
        return $this->allByAttr($keywords, fn (ActiveQuery $query) => $this->handleFilter($query, $keywords));
    }

    public function listsNotDelete(array $keywords = [])
    {
        $keywords['is_delete'] = Constant::NOT_DELETE;
        return $this->listsByAttr($keywords, fn (ActiveQuery $query) => $this->handleFilter($query, $keywords));
    }

    public function existsByIdNotDelete(int $id)
    {
        $where = ['id' => $id, 'is_delete' => Constant::NOT_DELETE];
        return $this->existsByAttr(fn (ActiveQuery $query) => $query->andFilterWhere($where));
    }

    public function getByIdNotDelete(int $id)
    {
        $where = ['id' => $id, 'is_delete' => Constant::NOT_DELETE];
        return $this->getByAttr(fn (ActiveQuery $query) => $query->andFilterWhere($where));
    }

    public function addOne(array $params)
    {
        $nowTime = date('Y-m-d H:i:s');
        $params['created_at'] = $nowTime;
        $params['updated_at'] = null;
        $params['operated_at'] = null;
        $params['is_delete'] = Constant::NOT_DELETE;
        $params['status'] = ArrayHelper::getValue($params, 'status', Goods::STATUS['NORMAL']);
        return parent::addOne($params);
    }

    public function editOneById(int $id, array $params)
    {
        $nowTime = date('Y-m-d H:i:s');
        $params['updated_at'] = $nowTime;
        unset($params['created_at'], $params['operated_at']);
        return $this->editOneByAttr($params, fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }

    public function removeById(int $id)
    {
        $nowTime = date('Y-m-d H:i:s');
        return $this->editOneByAttr(
            [
                'is_delete' => Constant::IS_DELETE,
                'operated_at' => $nowTime,
            ],
            fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id])
        );
    }

    public function enableById(int $id)
    {
        $nowTime = date('Y-m-d H:i:s');
        return $this->editOneByAttr(
            [
                'status' => Goods::STATUS['NORMAL'],
                'operated_at' => $nowTime,
            ],
            fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id])
        );
    }

    public function disableById(int $id)
    {
        $nowTime = date('Y-m-d H:i:s');
        return $this->editOneByAttr(
            [
                'status' => Goods::STATUS['DISABLE'],
                'operated_at' => $nowTime,
            ],
            fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id])
        );
    }

    public function deleteOneById(int $id)
    {
        return $this->deleteOneByAttr(fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }
}
