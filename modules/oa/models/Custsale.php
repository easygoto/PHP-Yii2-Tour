<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_custsale}}".
 *
 * @property int $id
 * @property int $custid
 * @property string $custname
 * @property int $uid
 * @property string $optname
 * @property string $optdt
 * @property int $state 状态
 * @property string $explain
 * @property string $money
 * @property string $applydt
 * @property string $dealdt 成交时间
 * @property string $adddt
 * @property string $laiyuan 销售来源
 * @property int $createid
 * @property string $createname
 * @property int $htid 合同ID
 */
class Custsale extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'custid' => ['type' => 'int', 'filter' => 'like'],
        'custname' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'dealdt' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'laiyuan' => ['type' => 'string', 'filter' => 'like'],
        'createid' => ['type' => 'int', 'filter' => 'like'],
        'createname' => ['type' => 'string', 'filter' => 'like'],
        'htid' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_custsale}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['custid', 'uid', 'state', 'createid', 'htid'], 'integer'],
            [['optdt', 'applydt', 'dealdt', 'adddt'], 'safe'],
            [['money'], 'number'],
            [['custname'], 'string', 'max' => 50],
            [['optname'], 'string', 'max' => 10],
            [['explain'], 'string', 'max' => 500],
            [['laiyuan', 'createname'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'custid' => 'Custid',
            'custname' => 'Custname',
            'uid' => 'Uid',
            'optname' => 'Optname',
            'optdt' => 'Optdt',
            'state' => '状态',
            'explain' => 'Explain',
            'money' => 'Money',
            'applydt' => 'Applydt',
            'dealdt' => '成交时间',
            'adddt' => 'Adddt',
            'laiyuan' => '销售来源',
            'createid' => 'Createid',
            'createname' => 'Createname',
            'htid' => '合同ID',
        ];
    }
}
