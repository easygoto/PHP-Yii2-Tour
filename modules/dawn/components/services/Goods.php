<?php


namespace app\modules\dawn\components\services;

use app\components\BaseService;
use app\modules\dawn\models\Goods as GoodsModel;
use yii\db\ActiveQuery;

class Goods extends BaseService
{
    protected $modelClass = GoodsModel::class;

    protected function search(ActiveQuery $query, $keywords): ActiveQuery
    {
        $model = new GoodsModel;
        $model->load($keywords);
        $query->andFilterWhere([
            'id'            => $model->id,
            'wholesale'     => $model->wholesale,
            'selling_price' => $model->selling_price,
            'market_price'  => $model->market_price,
            'inventory'     => $model->inventory,
            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at,
            'operated_at'   => $model->operated_at,
            'status'        => $model->status,
            'is_delete'     => $model->is_delete,
        ]);
        $query->andFilterWhere(['like', 'name', $model->name]);
        return $query;
    }
}
