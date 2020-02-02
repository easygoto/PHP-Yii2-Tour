<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_remind}}".
 *
 * @property int $id
 * @property string $startdt 开始时间
 * @property string $enddt 截止时间
 * @property int $uid 用户Id
 * @property string $optdt
 * @property string $optname 操作人
 * @property string $modenum 对应模块编号
 * @property string $table
 * @property int $mid 主Id
 * @property string $ratecont 频率
 * @property string $explain 提醒内容
 * @property string $rate 提醒频率o仅一次,d天,w周,m月
 * @property string $rateval
 * @property int $status
 * @property string $receid
 * @property string $recename 提醒给
 */
class Flowremind extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'modenum' => ['type' => 'string', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'ratecont' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'rate' => ['type' => 'string', 'filter' => 'like'],
        'rateval' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_flow_remind}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['startdt', 'enddt', 'optdt'], 'safe'],
            [['uid', 'mid', 'status'], 'integer'],
            [['optname'], 'string', 'max' => 20],
            [['modenum', 'table'], 'string', 'max' => 30],
            [['ratecont', 'explain', 'receid', 'recename'], 'string', 'max' => 500],
            [['rate'], 'string', 'max' => 50],
            [['rateval'], 'string', 'max' => 200],
            [['uid', 'table', 'mid'], 'unique', 'targetAttribute' => ['uid', 'table', 'mid']],
            [['uid', 'modenum', 'mid'], 'unique', 'targetAttribute' => ['uid', 'modenum', 'mid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'startdt' => '开始时间',
            'enddt' => '截止时间',
            'uid' => '用户Id',
            'optdt' => 'Optdt',
            'optname' => '操作人',
            'modenum' => '对应模块编号',
            'table' => 'Table',
            'mid' => '主Id',
            'ratecont' => '频率',
            'explain' => '提醒内容',
            'rate' => '提醒频率o仅一次,d天,w周,m月',
            'rateval' => 'Rateval',
            'status' => 'Status',
            'receid' => 'Receid',
            'recename' => '提醒给',
        ];
    }
}
