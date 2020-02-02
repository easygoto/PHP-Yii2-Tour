<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_city}}".
 *
 * @property int $id
 * @property int $pid 上级ＩＤ
 * @property string $name
 * @property int $type 类型0国家,1省,2市,3县
 * @property int $sort 排序
 * @property string $pinyin
 * @property string $pinyins 拼音简称
 */
class City extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'pinyin' => ['type' => 'string', 'filter' => 'like'],
        'pinyins' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_city}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'type', 'sort'], 'integer'],
            [['name', 'pinyin', 'pinyins'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '上级ＩＤ',
            'name' => 'Name',
            'type' => '类型0国家,1省,2市,3县',
            'sort' => '排序',
            'pinyin' => 'Pinyin',
            'pinyins' => '拼音简称',
        ];
    }
}
