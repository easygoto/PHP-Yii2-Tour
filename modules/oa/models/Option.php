<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_option}}".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $type 选项类型
 * @property int $pid
 * @property string $num 编号
 * @property string $value 对应值
 * @property int $sort 排序号
 * @property string $values
 * @property int $valid
 * @property string $optdt
 * @property int $optid
 * @property string $receid
 * @property string $recename
 * @property string $explain 说明
 */
class Option extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'value' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'values' => ['type' => 'string', 'filter' => 'like'],
        'valid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_option}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'pid', 'sort', 'valid', 'optid'], 'integer'],
            [['optdt'], 'safe'],
            [['name', 'num', 'values'], 'string', 'max' => 50],
            [['value'], 'string', 'max' => 1000],
            [['receid', 'recename'], 'string', 'max' => 300],
            [['explain'], 'string', 'max' => 200],
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
            'type' => '选项类型',
            'pid' => 'Pid',
            'num' => '编号',
            'value' => '对应值',
            'sort' => '排序号',
            'values' => 'Values',
            'valid' => 'Valid',
            'optdt' => 'Optdt',
            'optid' => 'Optid',
            'receid' => 'Receid',
            'recename' => 'Recename',
            'explain' => '说明',
        ];
    }
}
