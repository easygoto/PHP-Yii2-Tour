<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property string $id
 * @property string $pid 父级菜单id
 * @property string $sn 编号
 * @property string $name 名称
 * @property string $url 网址
 * @property int $sort 排序
 * @property string $icon 图标
 * @property int $status 状态(1启用, 0禁用)
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sort', 'status'], 'integer'],
            [['sn', 'name', 'icon'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'sn' => 'Sn',
            'name' => 'Name',
            'url' => 'Url',
            'sort' => 'Sort',
            'icon' => 'Icon',
            'status' => 'Status',
        ];
    }
}
