<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_cname}}".
 *
 * @property int $id
 * @property string $num 编号
 * @property string $name 审核组名
 * @property string $checkid
 * @property string $checkname 审核人
 * @property int $pid 上级ID
 * @property string $receid
 * @property string $recename 适用对象
 * @property int $sort 排序号
 */
class Flowcname extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'checkid' => ['type' => 'string', 'filter' => 'like'],
        'checkname' => ['type' => 'string', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_cname}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sort'], 'integer'],
            [['num'], 'string', 'max' => 30],
            [['name', 'checkid', 'checkname'], 'string', 'max' => 50],
            [['receid'], 'string', 'max' => 300],
            [['recename'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => '编号',
            'name' => '审核组名',
            'checkid' => 'Checkid',
            'checkname' => '审核人',
            'pid' => '上级ID',
            'receid' => 'Receid',
            'recename' => '适用对象',
            'sort' => '排序号',
        ];
    }
}
