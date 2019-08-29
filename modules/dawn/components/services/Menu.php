<?php


namespace app\modules\dawn\components\services;

use app\components\BaseService;
use yii\db\ActiveQuery;

class Menu extends BaseService
{
    protected $modelClass = \app\modules\dawn\models\Menu::class;

    protected function handleFilter(ActiveQuery $query, $keywords): ActiveQuery
    {
        $query->andFilterWhere([
            'pid'    => $keywords['pid'] ?? null,
            'sn'     => $keywords['sn'] ?? null,
            'url'    => $keywords['url'] ?? null,
            'sort'   => $keywords['sort'] ?? null,
            'status' => $keywords['status'] ?? null,
        ]);
        $query->andFilterWhere(['like', 'name', $keywords['name'] ?? null]);
        $query->andFilterWhere(['like', 'icon', $keywords['icon'] ?? null]);
        return $query;
    }
}
