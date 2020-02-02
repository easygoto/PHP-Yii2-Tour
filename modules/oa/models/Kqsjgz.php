<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqsjgz}}".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $sort 排序号
 * @property int $pid 主
 * @property string $stime 开始时间
 * @property string $etime 结束时间
 * @property int $qtype 取值类型@0|最小值,1|最大值
 * @property int $iskt 是否跨天
 * @property int $iskq 是否需要考勤
 * @property int $isxx 是否休息断
 */
class Kqsjgz extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'stime' => ['type' => 'string', 'filter' => 'like'],
        'etime' => ['type' => 'string', 'filter' => 'like'],
        'qtype' => ['type' => 'int', 'filter' => 'like'],
        'iskt' => ['type' => 'int', 'filter' => 'like'],
        'iskq' => ['type' => 'int', 'filter' => 'like'],
        'isxx' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_kqsjgz}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'pid', 'qtype', 'iskt', 'iskq', 'isxx'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['stime', 'etime'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'sort' => '排序号',
            'pid' => '主',
            'stime' => '开始时间',
            'etime' => '结束时间',
            'qtype' => '取值类型@0|最小值,1|最大值',
            'iskt' => '是否跨天',
            'iskq' => '是否需要考勤',
            'isxx' => '是否休息断',
        ];
    }
}
