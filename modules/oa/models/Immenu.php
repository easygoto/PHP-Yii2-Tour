<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_im_menu}}".
 *
 * @property int $id
 * @property int $mid
 * @property int $pid
 * @property string $name 名称
 * @property int $sort
 * @property int $type 1url,0事件
 * @property string $url 对应地址
 * @property string $num
 * @property string $color 颜色
 * @property string $receid
 * @property string $recename 可使用人员
 */
class Immenu extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'url' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'color' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_im_menu}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'pid', 'sort', 'type'], 'integer'],
            [['name', 'color'], 'string', 'max' => 10],
            [['url', 'receid', 'recename'], 'string', 'max' => 300],
            [['num'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => 'Mid',
            'pid' => 'Pid',
            'name' => '名称',
            'sort' => 'Sort',
            'type' => '1url,0事件',
            'url' => '对应地址',
            'num' => 'Num',
            'color' => '颜色',
            'receid' => 'Receid',
            'recename' => '可使用人员',
        ];
    }
}
