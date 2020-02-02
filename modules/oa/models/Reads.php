<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_reads}}".
 *
 * @property int $id
 * @property string $table
 * @property int $mid
 * @property int $optid
 * @property string $optdt
 * @property string $ip
 * @property string $web
 * @property string $adddt 第一次浏览
 * @property int $stotal 流程次数
 */
class Reads extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'ip' => ['type' => 'string', 'filter' => 'like'],
        'web' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'stotal' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_reads}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'optid', 'stotal'], 'integer'],
            [['optdt', 'adddt'], 'safe'],
            [['table', 'ip', 'web'], 'string', 'max' => 30],
            [['table', 'mid', 'optid'], 'unique', 'targetAttribute' => ['table', 'mid', 'optid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'mid' => 'Mid',
            'optid' => 'Optid',
            'optdt' => 'Optdt',
            'ip' => 'Ip',
            'web' => 'Web',
            'adddt' => '第一次浏览',
            'stotal' => '流程次数',
        ];
    }
}
