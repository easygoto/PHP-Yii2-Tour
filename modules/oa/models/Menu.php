<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_menu}}".
 *
 * @property int $id
 * @property string $name 菜单名
 * @property int $pid 上级id
 * @property int $sort 排序
 * @property string $url
 * @property string $icons
 * @property string $optdt
 * @property string $num 编号
 * @property int $ispir 1验证
 * @property int $status 1启用
 * @property string $color
 * @property int $ishs 是否在首页显示
 * @property int $iszm 是否为桌面版图标
 */
class Menu extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'url' => ['type' => 'string', 'filter' => 'like'],
        'icons' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'ispir' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'color' => ['type' => 'string', 'filter' => 'like'],
        'ishs' => ['type' => 'int', 'filter' => 'like'],
        'iszm' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_menu}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sort', 'ispir', 'status', 'ishs', 'iszm'], 'integer'],
            [['optdt'], 'safe'],
            [['name', 'icons', 'num'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 500],
            [['color'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '菜单名',
            'pid' => '上级id',
            'sort' => '排序',
            'url' => 'Url',
            'icons' => 'Icons',
            'optdt' => 'Optdt',
            'num' => '编号',
            'ispir' => '1验证',
            'status' => '1启用',
            'color' => 'Color',
            'ishs' => '是否在首页显示',
            'iszm' => '是否为桌面版图标',
        ];
    }
}
