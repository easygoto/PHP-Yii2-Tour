<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_subscribe}}".
 *
 * @property int $id
 * @property string $title 订阅标题
 * @property string $cont 订阅时提醒内容
 * @property string $explain 订阅说明
 * @property int $optid 操作人ID
 * @property string $optname 操作人
 * @property string $optdt
 * @property int $status 状态
 * @property string $suburl 订阅地址
 * @property string $suburlpost 订阅地址post参数
 * @property string $lastdt 最后运行时间
 * @property string $shateid
 * @property string $shatename 共享给
 */
class Subscribe extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'cont' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'suburl' => ['type' => 'string', 'filter' => 'like'],
        'suburlpost' => ['type' => 'string', 'filter' => 'like'],
        'lastdt' => ['type' => 'string', 'filter' => 'like'],
        'shateid' => ['type' => 'string', 'filter' => 'like'],
        'shatename' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_subscribe}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optid', 'status'], 'integer'],
            [['optdt', 'lastdt'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['cont'], 'string', 'max' => 200],
            [['explain'], 'string', 'max' => 100],
            [['optname'], 'string', 'max' => 20],
            [['suburl'], 'string', 'max' => 1000],
            [['suburlpost'], 'string', 'max' => 4000],
            [['shateid', 'shatename'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '订阅标题',
            'cont' => '订阅时提醒内容',
            'explain' => '订阅说明',
            'optid' => '操作人ID',
            'optname' => '操作人',
            'optdt' => 'Optdt',
            'status' => '状态',
            'suburl' => '订阅地址',
            'suburlpost' => '订阅地址post参数',
            'lastdt' => '最后运行时间',
            'shateid' => 'Shateid',
            'shatename' => '共享给',
        ];
    }
}
