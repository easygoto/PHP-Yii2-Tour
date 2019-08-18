<?php


namespace app\modules\common\controllers\api;

use app\modules\common\controllers\ApiController;
use app\modules\common\models\Menu;
use app\web\Yii;
use Trink\Core\Helper\Arrays;
use yii\web\HttpException;

class MenuController extends ApiController
{
    public function actionIndex()
    {
        $menuList = Menu::find()->all();
        $this->successJson('', ['list' => $menuList]);
    }

    public function actionView($id)
    {
        $menu = Menu::findOne($id) ?? [];
        $this->successJson('', $menu);
    }

    /**
     * @throws HttpException
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        if (!$request->isPost) {
            throw new HttpException('403', '需要POST方法');
        }
        $params = Yii::$app->request->post('params');
        $params = json_decode($params, true);
        if (!$params) {
            throw new HttpException('403', '需要JSON');
        }
        $menu = new Menu;
        $menu->sn = Arrays::get($params, 'sn');
        $menu->pid = Arrays::get($params, 'pid');
        $menu->url = Arrays::get($params, 'url');
        $menu->name = Arrays::get($params, 'name');
        $menu->icon = Arrays::get($params, 'icon');
        $menu->sort = Arrays::get($params, 'sort');
        $menu->status = Arrays::get($params, 'status');
        if (!$menu->save(true)) {
            throw new HttpException('403', var_export($menu->getErrors(), true));
        }
        $this->successJson('', ['params' => $params]);
    }

    public function actionUpdate()
    {
        $this->successJson('', []);
    }

    public function actionDelete()
    {
        $this->successJson('', []);
    }
}
