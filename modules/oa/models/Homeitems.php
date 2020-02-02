<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_homeitems}}".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $num 编号
 * @property string $receid
 * @property string $recename
 * @property int $sort 排序号
 * @property int $status 状态
 * @property int $row 所在位置
 */
class Homeitems extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'row' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_homeitems}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num'], 'required'],
            [['sort', 'status', 'row'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['num'], 'string', 'max' => 30],
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
            'name' => '名称',
            'num' => '编号',
            'receid' => 'Receid',
            'recename' => 'Recename',
            'sort' => '排序号',
            'status' => '状态',
            'row' => '所在位置',
        ];
    }
}
