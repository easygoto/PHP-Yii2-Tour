<?php

namespace app\modules\dawn\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%dawn_menu}}".
 *
 * @property string $id
 * @property string $pid 父级菜单ID
 * @property string $sn 编号
 * @property string $name 名称
 * @property string $url 网址
 * @property int $sort 排序
 * @property string $icon 图标
 * @property int $status 状态(1启用, 0禁用)
 */
class Menu extends \yii\db\ActiveRecord
{
    const STATUS = [
        'NORMAL' => 1,
        'DISABLE' => 2,
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dawn_menu}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $menuIdList = array_merge([0], array_map(function (Menu $menu) {
            return (int)$menu->id;
        }, Menu::find()->all()));
        return [
            [['name', 'pid'], 'required', 'message' => '{attribute}不可为空'],
            [['pid', 'sort', 'status'], 'integer', 'min' => 0, 'message' => '{attribute}必须为非负整数'],
            [['pid'], 'in', 'range' => $menuIdList, 'message' => '{attribute}无效'],
            [['pid'], 'compare', 'compareAttribute' => 'id', 'operator' => '!=', 'message' => '{attribute}不可和ID相同'],
            [['status'], 'in', 'range' => array_values(Menu::STATUS)],
            [['sn', 'name', 'icon'], 'string', 'max' => 50, 'message' => '{attribute}不可超过50个字符'],
            [['url'], 'string', 'max' => 200, 'message' => '{attribute}不可超过200个字符'],
            [['name', 'sn', 'url', 'icon'], 'trim'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '父级菜单ID',
            'sn' => '编号',
            'name' => '名称',
            'url' => '网址',
            'sort' => '排序',
            'icon' => '图标',
            'status' => '状态',
        ];
    }
}
