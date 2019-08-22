<?php


namespace app\modules\dawn\controllers\api;

use app\modules\dawn\controllers\ApiController;
use app\modules\dawn\helpers\Constant;
use app\modules\dawn\helpers\Message;
use app\modules\dawn\models\Menu;
use app\web\Yii;
use OpenApi\Annotations as OA;
use Trink\Core\Helper\Format;
use yii\web\Response;

class MenuController extends ApiController
{
    /**
     * @OA\Get(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu/list/{page}",
     *     @OA\Parameter(name="page", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param int $page
     *
     * @return Response
     */
    public function actionIndex($page = Constant::DEFAULT_PAGE)
    {
        // 构造条件
        $offset = ($page - 1) * Constant::DEFAULT_PAGE_SIZE;
        $menuObj = Menu::find()->offset($offset)->limit(Constant::DEFAULT_PAGE_SIZE);
        if (!$menuObj) {
            return $this->listJson([], 0);
        }

        // 关键信息
        $menuTotal = $menuObj->count('1');
        $menuList = array_map(function (Menu $menu) {
            return $menu->getAttributes(null, ['pid']);
        }, $menuObj->all());
        $menuList = Format::array2CamelCase($menuList);
        return $this->listJson($menuList, $menuTotal);
    }

    /**
     * @OA\Get(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu/{id}",
     *     @OA\Parameter(name="id", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionView($id)
    {
        $menuObj = Menu::findOne($id);
        if (!$menuObj) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        $menu = $menuObj->getAttributes(null, ['pid']);
        return $this->successJson(Message::SUCCESS, $menu);
    }

    /**
     * @OA\Post(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu",
     *     @OA\Parameter(name="pid", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="sn", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="name", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="url", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="sort", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="icon",in="path",required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="status",in="path",required=false, @OA\Schema(type="integer", enum={1,2})),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @return Response
     */
    public function actionCreate()
    {
        $params = Yii::$app->request->post();
        $menu = new Menu;
        $menu->setAttributes($params);
        if (!$menu->save(true)) {
            return $this->failJson(Message::CREATE_FAIL, $menu->getErrors());
        }
        return $this->successJson(Message::CREATE_SUCCESS, ['id' => $menu->getAttribute('id'), 'menu' => $menu]);
    }

    /**
     * @OA\Put(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu/{id}",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="pid", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="sn", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="name", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="url", in="path", required=false, @OA\Schema(type="string")),
     *     @OA\Parameter(name="sort", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="icon", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="status", in="path", required=false, @OA\Schema(type="integer", enum={1,2})),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $menu = Menu::findOne($id);
        if (!$menu) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        $params = Yii::$app->request->post();
        $menu->setAttributes($params);
        if (!$menu->save(true)) {
            return $this->failJson(Message::UPDATE_FAIL, $menu->getErrors());
        }
        return $this->successJson(Message::UPDATE_SUCCESS, ['params' => $params]);
    }

    /**
     * @OA\Delete(
     *     tags={"菜单相关接口"},
     *     path="/dawn/api/menu/{id}",
     *     @OA\Parameter(name="id", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="")
     * )
     *
     * @param $id
     *
     * @return Response
     */
    public function actionDelete($id)
    {
        $menu = Menu::findOne($id);
        if (!$menu) {
            return $this->failJson(Message::NOT_EXISTS);
        }
        $result = Menu::deleteAll(['id' => $id]);
        if (!$result) {
            return $this->failJson(Message::DELETE_FAIL);
        }
        return $this->successJson(Message::DELETE_SUCCESS);
    }
}
