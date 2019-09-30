<?php

namespace app\modules\dawn\components\action;

use app\web\Yii;
use yii\grid\ActionColumn;

class GoodsActionColumn extends ActionColumn
{
    protected function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'eye-open', [
            'title' => '查看',
        ]);
        $this->initDefaultButton('update', 'pencil', [
            'title' => '修改',
        ]);
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => Yii::t('yii', '您是否确定要删除这件商品？'),
            'data-method' => 'post',
            'title' => '删除',
        ]);
    }
}
