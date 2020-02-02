<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_goodss}}".
 *
 * @property int $id
 * @property int $aid 物品Id
 * @property int $count 数量
 * @property int $uid
 * @property int $type 0入库,1出库
 * @property int $kind 出入库类型
 * @property string $optname
 * @property string $applydt 申请日期
 * @property string $optdt
 * @property string $explain
 * @property int $status
 * @property int $optid
 * @property int $mid 对应主表
 * @property int $sort
 * @property string $unit 单位
 * @property string $price 单价
 * @property int $depotid 存放仓库ID
 */
class Goodss extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'aid' => ['type' => 'int', 'filter' => 'like'],
        'count' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'kind' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'unit' => ['type' => 'string', 'filter' => 'like'],
        'price' => ['type' => 'string', 'filter' => 'like'],
        'depotid' => ['type' => 'int', 'filter' => 'like'],
    ];

    const RESULT_FILTER = [
        'all' => [
            'include' => null,
            'exclude' => []
        ],
        'list' => [
            'include' => null,
            'exclude' => []
        ],
        'detail' => [
            'include' => null,
            'exclude' => []
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%oa_goodss}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aid', 'count', 'uid', 'type', 'kind', 'status', 'optid', 'mid', 'sort', 'depotid'], 'integer'],
            [['applydt', 'optdt'], 'safe'],
            [['price'], 'number'],
            [['optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['unit'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aid' => '物品Id',
            'count' => '数量',
            'uid' => 'Uid',
            'type' => '0入库,1出库',
            'kind' => '出入库类型',
            'optname' => 'Optname',
            'applydt' => '申请日期',
            'optdt' => 'Optdt',
            'explain' => 'Explain',
            'status' => 'Status',
            'optid' => 'Optid',
            'mid' => '对应主表',
            'sort' => 'Sort',
            'unit' => '单位',
            'price' => '单价',
            'depotid' => '存放仓库ID',
        ];
    }
}
