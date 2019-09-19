<?php


namespace app\modules\dawn\components\services;

use app\components\BaseService;
use app\modules\dawn\models;
use yii\db\ActiveQuery;

class User extends BaseService
{
    protected $modelClass = models\User::class;

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
        return $this->lists($keywords);
    }

    public function getNotDelete(int $id)
    {
        return $this->get($id, function (models\User $item) {
            return $item->getAttributes(null, ['is_delete']);
        }, function (ActiveQuery $query) {
            return $query->andFilterWhere(['is_delete' => 0]);
        });
    }

    public function del($id, $params = [])
    {
        $params = ['is_delete' => 0];
        return parent::del($id, $params);
    }
}
