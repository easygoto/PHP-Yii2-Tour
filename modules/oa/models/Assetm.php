<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_assetm}}".
 *
 * @property int $id
 * @property int $typeid 类别
 * @property string $title 名称
 * @property string $num 编号
 * @property string $brand 品牌
 * @property string $model 规格型号
 * @property string $laiyuan 来源
 * @property string $shuname 所属部门
 * @property string $dt 日期
 * @property int $ckid 存放地点
 * @property int $state 状态
 * @property string $explain 说明
 * @property string $optname 操作人
 * @property string $adddt 添加时间
 * @property string $optdt 操作时间
 * @property string $buydt 购进日期
 * @property string $price 价格
 * @property int $optid
 * @property int $status 状态
 * @property string $useid
 * @property string $usename 使用人
 * @property string $fengmian 封面图片
 */
class Assetm extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'typeid' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'brand' => ['type' => 'string', 'filter' => 'like'],
        'model' => ['type' => 'string', 'filter' => 'like'],
        'laiyuan' => ['type' => 'string', 'filter' => 'like'],
        'shuname' => ['type' => 'string', 'filter' => 'like'],
        'dt' => ['type' => 'string', 'filter' => 'like'],
        'ckid' => ['type' => 'int', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'buydt' => ['type' => 'string', 'filter' => 'like'],
        'price' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'useid' => ['type' => 'string', 'filter' => 'like'],
        'usename' => ['type' => 'string', 'filter' => 'like'],
        'fengmian' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_assetm}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeid', 'ckid', 'state', 'optid', 'status'], 'integer'],
            [['dt', 'adddt', 'optdt', 'buydt'], 'safe'],
            [['price'], 'number'],
            [['title', 'laiyuan', 'shuname', 'useid', 'usename', 'fengmian'], 'string', 'max' => 50],
            [['num', 'brand', 'optname'], 'string', 'max' => 20],
            [['model'], 'string', 'max' => 100],
            [['explain'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typeid' => '类别',
            'title' => '名称',
            'num' => '编号',
            'brand' => '品牌',
            'model' => '规格型号',
            'laiyuan' => '来源',
            'shuname' => '所属部门',
            'dt' => '日期',
            'ckid' => '存放地点',
            'state' => '状态',
            'explain' => '说明',
            'optname' => '操作人',
            'adddt' => '添加时间',
            'optdt' => '操作时间',
            'buydt' => '购进日期',
            'price' => '价格',
            'optid' => 'Optid',
            'status' => '状态',
            'useid' => 'Useid',
            'usename' => '使用人',
            'fengmian' => '封面图片',
        ];
    }
}
