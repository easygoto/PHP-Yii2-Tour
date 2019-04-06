<?php

namespace app\controllers\api\v1;

use app\models\Goods;
use yii\db\Exception;
use yii\db\Query;
use yii\web\Controller;

class GoodsController extends Controller {
    
    public function actionGet($id) {
        $id = max(0, intval($id));
        if (! $id) {
            return $this->asJson(['success' => false, 'msg' => '商品不存在(1)']);
        }
        $goods = Goods::findOne($id);
        if (! $goods) {
            return $this->asJson(['success' => false, 'msg' => '商品不存在(2)']);
        }
        return $this->asJson(['success' => true, 'data' => $goods]);
    }
    
    public function actionList($page = 1) {
        $page     = max(1, intval($page));
        $pageSize = 20;
        
        $query    = new Query();
        $query->select('*');
        $query->from('`b_goods`');
        $query->where('is_delete=0');
        $query->limit($pageSize);
        $query->offset(($page - 1) * $pageSize);
        $list       = $query->all();
        $total      = $query->count();
        $totalPages = ceil($total / $pageSize);
        
        return $this->asJson([
            'success' => true,
            'data'    => [
                'list'      => $list,
                'total'     => $total,
                'totalPage' => $totalPages,
            ],
        ]);
    }
    
    public function actionCreate() {
        $data = \Yii::$app->request->post();
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $goods = new Goods;
    
            $now = date('Y-m-d H:i:s');
            $goods->name = $this->_trimValue($data, 'name');
            $goods->wholesale = array_key_exists('wholesale', $data) ? floatval($data['wholesale']) : 0;
            $goods->selling_price = array_key_exists('selling_price', $data) ? floatval($data['selling_price']) : 0;
            $goods->market_price = array_key_exists('market_price', $data) ? floatval($data['market_price']) : 0;
            $goods->inventory = array_key_exists('inventory', $data) ? intval($data['inventory']) : 0;
            $goods->created_at = $now;
            $goods->updated_at = $now;
            $goods->operated_at = $now;
            $goods->status = 1;
            $goods->is_delete = 0;
    
            if (! $goods->save()) {
                throw new Exception('未保存成功');
            }
            
            $transaction->commit();
            return $this->asJson(['success' => true, 'msg' => '保存成功']);
        } catch (\Exception $e) {
            try {
                $transaction->rollBack();
            } catch (Exception $e) {
                return $this->asJson(['success' => false, 'msg' => $e->getMessage()]);
            }
            return $this->asJson(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
    
    private function _trimValue($arr, $key) {
        if (! isset($arr[$key])) {
            return null;
        }
        if (is_string($arr[$key])) {
            return trim($arr[$key]);
        }
        return $arr[$key];
    }
}
