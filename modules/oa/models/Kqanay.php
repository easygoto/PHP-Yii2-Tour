<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqanay}}".
 *
 * @property int $id
 * @property string $dt 日期
 * @property int $uid 人员id
 * @property string $ztname 状态名称
 * @property string $time
 * @property string $state 状态名称
 * @property string $states 其他状态,如请假
 * @property int $sort
 * @property int $iswork 是否工作日
 * @property int $emiao 秒数
 * @property string $optdt
 * @property string $remark
 * @property string $timesb 应上班时间(小时)
 * @property string $timeys 已上班时间(小时)
 */
class Kqanay extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'dt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'ztname' => ['type' => 'string', 'filter' => 'like'],
        'time' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'string', 'filter' => 'like'],
        'states' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'iswork' => ['type' => 'int', 'filter' => 'like'],
        'emiao' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'remark' => ['type' => 'string', 'filter' => 'like'],
        'timesb' => ['type' => 'string', 'filter' => 'like'],
        'timeys' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_kqanay}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt', 'time', 'optdt'], 'safe'],
            [['uid', 'sort', 'iswork', 'emiao'], 'integer'],
            [['timesb', 'timeys'], 'number'],
            [['ztname', 'state', 'states'], 'string', 'max' => 20],
            [['remark'], 'string', 'max' => 100],
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
            'uid' => '人员id',
            'ztname' => '状态名称',
            'time' => 'Time',
            'state' => '状态名称',
            'states' => '其他状态,如请假',
            'sort' => 'Sort',
            'iswork' => '是否工作日',
            'emiao' => '秒数',
            'optdt' => 'Optdt',
            'remark' => 'Remark',
            'timesb' => '应上班时间(小时)',
            'timeys' => '已上班时间(小时)',
        ];
    }
}
