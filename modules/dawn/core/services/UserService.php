<?php


namespace app\modules\dawn\core\services;

use app\core\components\BaseService;
use app\modules\dawn\models\User;
use yii\db\ActiveQuery;

class UserService extends BaseService
{
    protected function handleFilter(ActiveQuery $query, $keywords): ActiveQuery
    {
        $query->andFilterWhere([
            'id'            => $keywords['id'] ?? null,
            'secret_code'   => $keywords['secret_code'] ?? null,
            'gender'        => $keywords['gender'] ?? null,
            'created_at'    => $keywords['created_at'] ?? null,
            'updated_at'    => $keywords['updated_at'] ?? null,
            'operated_at'   => $keywords['operated_at'] ?? null,
            'last_login_at' => $keywords['last_login_at'] ?? null,
            'status'        => $keywords['status'] ?? null,
            'is_delete'     => $keywords['is_delete'] ?? null,
        ]);
        $query->andFilterWhere(['like', 'user_name', $keywords['user_name'] ?? null]);
        $query->andFilterWhere(['like', 'real_name', $keywords['real_name'] ?? null]);
        $query->andFilterWhere(['like', 'mobile_number', $keywords['mobile_number'] ?? null]);
        return $query;
    }

    public function listsNotDelete(array $keywords)
    {
        $keywords['is_delete'] = 0;
        return $this->listsByAttr($keywords);
    }

    public function getNotDelete(int $id)
    {
        return $this->getByAttr(
            fn (User $item) => $item->getAttributes(null, ['is_delete']),
            fn (ActiveQuery $query) => $query->andFilterWhere(['id' => $id, 'is_delete' => 0])
        );
    }

    public function delete($id, $params = [])
    {
        $params = ['is_delete' => 0];
        return parent::delete($id, $params);
    }
}
