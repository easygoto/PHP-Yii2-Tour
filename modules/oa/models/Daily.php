<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_daily}}".
 *
 * @property int $id
 * @property string $dt 日期
 * @property string $content 内容
 * @property string $adddt 新增时间
 * @property string $optdt 操作时间
 * @property int $uid
 * @property string $optname 姓名
 * @property int $type 类型@0|日报,1|周报,2|月报,3|年报
 * @property string $plan 明日计划
 * @property int $status
 * @property string $enddt
 * @property int $optid
 * @property int $mark 得分
 */
class Daily extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'dt' => ['type' => 'string', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'plan' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'mark' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_daily}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt', 'adddt', 'optdt', 'enddt'], 'safe'],
            [['uid', 'type', 'status', 'optid', 'mark'], 'integer'],
            [['content'], 'string', 'max' => 4000],
            [['optname'], 'string', 'max' => 20],
            [['plan'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt' => '日期',
            'content' => '内容',
            'adddt' => '新增时间',
            'optdt' => '操作时间',
            'uid' => 'Uid',
            'optname' => '姓名',
            'type' => '类型@0|日报,1|周报,2|月报,3|年报',
            'plan' => '明日计划',
            'status' => 'Status',
            'enddt' => 'Enddt',
            'optid' => 'Optid',
            'mark' => '得分',
        ];
    }
}
