<?php


namespace app\modules\dawn\core\services;

use app\core\components\BaseService;
use app\core\helpers\FilterHandler;
use app\modules\dawn\core\containers\Constant;
use app\modules\dawn\models\User;
use yii\db\ActiveQuery;

class UserService extends BaseService
{
    protected function handleFilter(ActiveQuery $query, array $keywords = []): ActiveQuery
    {
        $query = (new FilterHandler())
            ->setEquals(['gender', 'status', 'is_delete'])
            ->setLike(['id', 'user_name', 'real_name', 'mobile_number'])
            ->setRange(['created_at', 'updated_at', 'operated_at', 'last_login_at'])
            ->buildQuery($query);
        return $query;
    }

    protected function handleResult(User $item, $scope = 'list')
    {
        switch ($scope) {
            default:
            case 'all':
            case 'list':
            case 'detail':
                return $this->handleModelType($item->getAttributes(null, ['is_delete']));
        }
    }

    public function listsNotDelete(array $keywords = [])
    {
        $keywords['is_delete'] = 0;
        return $this->listsByAttr(
            $keywords,
            fn (ActiveQuery $query) => $this->handleFilter($query, $keywords),
            fn (User $item) => $this->handleResult($item, 'list')
        );
    }

    public function getNotDelete(int $id)
    {
        return $this->getByAttr(
            fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id, 'is_delete' => Constant::NOT_DELETE]),
            fn (User $item) => $this->handleResult($item, 'detail')
        );
    }

    public function deleteOneById(int $id)
    {
        return $this->deleteOneByAttr(fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id]));
    }
}
