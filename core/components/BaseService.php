<?php


namespace app\core\components;

use app\core\containers\Constant;
use app\core\containers\Message;
use app\core\helpers\SortHandler;
use Closure;
use Trink\Core\Helper\Result;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

abstract class BaseService
{
    protected ActiveRecord $model;

    protected Message $message;

    protected Closure $handleResult;

    protected Closure $handleQuery;

    public function __construct()
    {
        $serviceClassName = rtrim(get_class($this), 'Service');
        $modelClassName = str_replace('core\services', 'models', $serviceClassName);
        $messageClassName = str_replace('core\services', 'core\containers\messages', $serviceClassName . 'Message');
        $messageClassName = class_exists($messageClassName) ? $messageClassName : Message::class;

        $this->model = new $modelClassName;
        $this->message = new $messageClassName;
        $this->handleResult = fn (ActiveRecord $item) => $item->getAttributes();
        $this->handleQuery = fn (ActiveQuery $query, array $keywords = []) => $query;
    }

    /**
     * 处理排序
     *
     * @param ActiveQuery $query
     * @param SortHandler $sorter
     *
     * @return ActiveQuery
     */
    protected function handleSort(ActiveQuery $query, SortHandler $sorter): ActiveQuery
    {
        $primaryKey = $this->model->primaryKey;
        if (!$sorter->hasRule($primaryKey)) {
            $sorter->addRule($primaryKey, 'DESC');
        }
        foreach ($sorter->getProps() as $column => $method) {
            if ($this->model->hasAttribute($column)) {
                $query->addOrderBy("{$column} {$method}");
            }
        }
        return $query;
    }

    /**
     * 根据查询获取全部记录
     *
     * @param array        $keywords
     * @param Closure|null $handleQuery  构造查询条件
     * @param Closure|null $handleResult 处理结果集
     *
     * @return Result
     */
    public function allByAttr(array $keywords = [], Closure $handleQuery = null, Closure $handleResult = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $handleResult = $handleResult ?: $this->handleResult;

        $query = $this->model::find();
        $query = $this->handleSort($query, SortHandler::load($keywords));
        $query = $handleQuery($query, $keywords);

        $total = $query->count('1');
        $list = array_map(fn (ActiveRecord $item) => $handleResult($item), $query->all());
        return Result::success('OK', ['list' => $list, 'total' => $total]);
    }

    /**
     * 根据查询获取列表记录
     *
     * @param array        $keywords
     * @param Closure|null $handleQuery  构造查询条件
     * @param Closure|null $handleResult 处理结果集
     *
     * @return Result
     */
    public function listsByAttr(array $keywords = [], Closure $handleQuery = null, Closure $handleResult = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $handleResult = $handleResult ?: $this->handleResult;

        $page = (int)($keywords['page'] ?? Constant::DEFAULT_PAGE);
        $page = max($page, Constant::MIN_PAGE);
        $pageSize = (int)($keywords['page_size'] ?? Constant::DEFAULT_PAGE_SIZE);
        $pageSize = min($pageSize, Constant::MAX_PAGE_SIZE);
        $pageSize = max($pageSize, Constant::MIN_PAGE_SIZE);
        $offset = ($page - 1) * $pageSize;

        $query = $this->model::find()->offset($offset)->limit($pageSize);
        $query = $this->handleSort($query, SortHandler::load($keywords));
        $query = $handleQuery($query, $keywords);

        $total = $query->count('1');
        $list = array_map(fn (ActiveRecord $item) => $handleResult($item), $query->all());
        return Result::lists($list, $total, $page, $pageSize);
    }

    public function exists(int $id, Closure $handleQuery = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $query = $this->model::find()->where(['id' => $id]);
        $query = $handleQuery($query);
        if ($query->exists() === false) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }
        return Result::success();
    }

    public function get(int $id, Closure $handleQuery = null, Closure $handleResult = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        return $this->getByAttr($handleResult, fn (ActiveQuery $query) => ($handleQuery($query))->andFilterWhere(['id' => $id]));
    }

    public function getByAttr(Closure $handleResult = null, Closure $handleQuery = null)
    {
        $handleQuery = $handleQuery ?: $this->handleQuery;
        $handleResult = $handleResult ?: $this->handleResult;

        $query = $this->model::find();
        $object = ($handleQuery($query))->one();
        if (!$object) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }

        $detail = $handleResult($object);
        return Result::success('OK', $detail);
    }

    public function save(array $params)
    {
        $modelId = (int)($params['id'] ?? 0);
        $result = $this->exists($modelId);
        if ($result->isSuccess()) {
            $model = new $this->model;
        } else {
            $model = $this->model::findOne($modelId);
        }

        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail($this->message::get('SAVE_FAIL'), $model->getErrors());
        }

        return Result::success($this->message::get('SAVE_SUCCESS'), [
            'id' => $model->getAttribute('id'),
        ]);
    }

    public function add(array $params)
    {
        $this->model->setAttributes($params);
        if (!$this->model->save(true)) {
            return Result::fail($this->message::get('CREATE_FAIL'), $this->model->getErrors());
        }

        return Result::success($this->message::get('CREATE_SUCCESS'), [
            'id' => $this->model->getAttribute('id'),
        ]);
    }

    public function edit(int $id, array $params)
    {
        $model = $this->model::findOne($id);
        if (!$model) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }

        $model->setAttributes($params);
        if (!$model->save(true)) {
            return Result::fail($this->message::get('UPDATE_FAIL'), $model->getErrors());
        }

        return Result::success($this->message::get('UPDATE_SUCCESS'));
    }

    public function delete(int $id, array $params = [])
    {
        $query = $this->model::find()->where(['id' => $id]);
        $exists = $query->exists();
        if (!$exists) {
            return Result::fail($this->message::get('NOT_EXISTS'));
        }

        $exists = $query->andFilterWhere($params)->exists();
        if (!$exists) {
            return Result::success($this->message::get('DELETED'));
        }

        $result = $this->model::deleteAll(['id' => $id]);
        if (!$result) {
            return Result::fail($this->message::get('DELETE_FAIL'));
        }

        return Result::success($this->message::get('DELETE_SUCCESS'));
    }
}
