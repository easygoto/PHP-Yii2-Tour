<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_schedule}}".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $startdt
 * @property string $enddt
 * @property int $uid 用户Id
 * @property string $optdt
 * @property string $optname 操作人
 * @property int $mid 主Id
 * @property string $ratecont 频率
 * @property string $explain 说明
 * @property string $rate
 * @property string $rateval
 * @property int $txsj 是否提醒
 * @property int $status
 * @property string $receid
 * @property string $recename 提醒给
 */
class Schedule extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'ratecont' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'rate' => ['type' => 'string', 'filter' => 'like'],
        'rateval' => ['type' => 'string', 'filter' => 'like'],
        'txsj' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_schedule}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['startdt', 'enddt', 'optdt'], 'safe'],
            [['uid', 'mid', 'txsj', 'status'], 'integer'],
            [['title', 'rateval'], 'string', 'max' => 50],
            [['optname'], 'string', 'max' => 20],
            [['ratecont', 'explain'], 'string', 'max' => 500],
            [['rate'], 'string', 'max' => 5],
            [['receid', 'recename'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'startdt' => 'Startdt',
            'enddt' => 'Enddt',
            'uid' => '用户Id',
            'optdt' => 'Optdt',
            'optname' => '操作人',
            'mid' => '主Id',
            'ratecont' => '频率',
            'explain' => '说明',
            'rate' => 'Rate',
            'rateval' => 'Rateval',
            'txsj' => '是否提醒',
            'status' => 'Status',
            'receid' => 'Receid',
            'recename' => '提醒给',
        ];
    }
}
