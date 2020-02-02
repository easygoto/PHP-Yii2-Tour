<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_extent}}".
 *
 * @property int $id
 * @property string $recename
 * @property string $receid
 * @property int $modeid 模块
 * @property int $type 0查看,1添加,2编辑,3删除
 * @property string $wherestr 条件
 * @property string $explain
 * @property int $status
 * @property int $whereid 条件Id
 * @property string $fieldstr 相关字段
 */
class Flowextent extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'modeid' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'wherestr' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'whereid' => ['type' => 'int', 'filter' => 'like'],
        'fieldstr' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_flow_extent}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modeid', 'type', 'status', 'whereid'], 'integer'],
            [['recename', 'receid'], 'string', 'max' => 4000],
            [['wherestr', 'explain', 'fieldstr'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recename' => 'Recename',
            'receid' => 'Receid',
            'modeid' => '模块',
            'type' => '0查看,1添加,2编辑,3删除',
            'wherestr' => '条件',
            'explain' => 'Explain',
            'status' => 'Status',
            'whereid' => '条件Id',
            'fieldstr' => '相关字段',
        ];
    }
}
