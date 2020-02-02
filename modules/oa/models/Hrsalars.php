<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrsalars}}".
 *
 * @property int $id
 * @property int $mid 对应主表hrsalarm.id
 * @property int $sort 排序号
 * @property string $name 名称
 * @property string $fields 对应字段
 * @property string $gongsi 公式
 * @property int $type 0字段,1增加,2减少
 * @property string $beizhu 备注
 * @property string $devzhi 默认值
 */
class Hrsalars extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'fields' => ['type' => 'string', 'filter' => 'like'],
        'gongsi' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'beizhu' => ['type' => 'string', 'filter' => 'like'],
        'devzhi' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrsalars}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'sort', 'type'], 'integer'],
            [['name', 'fields'], 'string', 'max' => 50],
            [['gongsi'], 'string', 'max' => 1000],
            [['beizhu'], 'string', 'max' => 200],
            [['devzhi'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '对应主表hrsalarm.id',
            'sort' => '排序号',
            'name' => '名称',
            'fields' => '对应字段',
            'gongsi' => '公式',
            'type' => '0字段,1增加,2减少',
            'beizhu' => '备注',
            'devzhi' => '默认值',
        ];
    }
}
