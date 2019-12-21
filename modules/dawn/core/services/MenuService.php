<?php


namespace app\modules\dawn\core\services;

use app\core\components\BaseService;
use app\core\helpers\FilterHandler;
use yii\db\ActiveQuery;

class MenuService extends BaseService
{
    protected function handleFilter(ActiveQuery $query, array $keywords = []): ActiveQuery
    {
        $query = (new FilterHandler())
            ->setLike(['pid', 'sn', 'url', 'sort', 'status', 'name', 'icon'])
            ->buildQuery($query);
        return $query;
    }
}
