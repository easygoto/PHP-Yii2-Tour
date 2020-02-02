<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_fininfos}}".
 *
 * @property int $id
 * @property int $mid 对应主表fininfom.id
 * @property int $sort 排序号
 * @property string $sdt 发生日期
 * @property string $name 所属项目
 * @property string $money 金额
 * @property string $sm 说明
 * @property string $didian 发生地点
 */
class Fininfos extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'sdt' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'sm' => ['type' => 'string', 'filter' => 'like'],
        'didian' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_fininfos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'sort'], 'integer'],
            [['sdt'], 'safe'],
            [['money'], 'number'],
            [['name'], 'string', 'max' => 20],
            [['sm'], 'string', 'max' => 100],
            [['didian'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '对应主表fininfom.id',
            'sort' => '排序号',
            'sdt' => '发生日期',
            'name' => '所属项目',
            'money' => '金额',
            'sm' => '说明',
            'didian' => '发生地点',
        ];
    }
}
