<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_company}}".
 *
 * @property int $id
 * @property string $name 公司名称
 * @property string $nameen 英文名
 * @property string $tel 电话
 * @property string $fax 传真
 * @property int $pid 对应上级
 * @property int $sort 排序号
 * @property string $fuzeid 对应负责人Id
 * @property string $fuzename 对应负责人
 * @property string $address 地址
 * @property string $city 所在城市
 */
class Company extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'nameen' => ['type' => 'string', 'filter' => 'like'],
        'tel' => ['type' => 'string', 'filter' => 'like'],
        'fax' => ['type' => 'string', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'fuzeid' => ['type' => 'string', 'filter' => 'like'],
        'fuzename' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'city' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_company}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['nameen'], 'string', 'max' => 200],
            [['tel', 'fax', 'fuzeid', 'fuzename', 'city'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '公司名称',
            'nameen' => '英文名',
            'tel' => '电话',
            'fax' => '传真',
            'pid' => '对应上级',
            'sort' => '排序号',
            'fuzeid' => '对应负责人Id',
            'fuzename' => '对应负责人',
            'address' => '地址',
            'city' => '所在城市',
        ];
    }
}
