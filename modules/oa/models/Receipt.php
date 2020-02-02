<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_receipt}}".
 *
 * @property int $id
 * @property string $modenum 对应模块编号
 * @property string $modename 模块名称
 * @property string $table 对应主表
 * @property int $mid 主表Id
 * @property int $uid 对应人员
 * @property string $receid 发送给
 * @property string $recename
 * @property string $receids 已确认人员Id
 * @property string $optdt 操作时间
 * @property string $explain 内容
 * @property int $ushuz 总人数
 * @property int $ushuy 已确认
 * @property int $status
 * @property string $optname 操作人
 */
class Receipt extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'modenum' => ['type' => 'string', 'filter' => 'like'],
        'modename' => ['type' => 'string', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'receids' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'ushuz' => ['type' => 'int', 'filter' => 'like'],
        'ushuy' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_receipt}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'uid', 'ushuz', 'ushuy', 'status'], 'integer'],
            [['optdt'], 'safe'],
            [['modenum', 'modename', 'table'], 'string', 'max' => 30],
            [['receid', 'receids'], 'string', 'max' => 4000],
            [['recename'], 'string', 'max' => 200],
            [['explain'], 'string', 'max' => 500],
            [['optname'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modenum' => '对应模块编号',
            'modename' => '模块名称',
            'table' => '对应主表',
            'mid' => '主表Id',
            'uid' => '对应人员',
            'receid' => '发送给',
            'recename' => 'Recename',
            'receids' => '已确认人员Id',
            'optdt' => '操作时间',
            'explain' => '内容',
            'ushuz' => '总人数',
            'ushuy' => '已确认',
            'status' => 'Status',
            'optname' => '操作人',
        ];
    }
}
