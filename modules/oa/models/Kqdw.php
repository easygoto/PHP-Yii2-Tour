<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqdw}}".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $location_x
 * @property string $location_y
 * @property string $address 位置名称
 * @property int $precision 允许误差米
 * @property int $scale
 * @property string $wifiname 打卡wifi名
 * @property int $iswgd 是否为无固定地点
 * @property string $dwids 关联对应ID,实现多点定位
 */
class Kqdw extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'location_x' => ['type' => 'string', 'filter' => 'like'],
        'location_y' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'precision' => ['type' => 'int', 'filter' => 'like'],
        'scale' => ['type' => 'int', 'filter' => 'like'],
        'wifiname' => ['type' => 'string', 'filter' => 'like'],
        'iswgd' => ['type' => 'int', 'filter' => 'like'],
        'dwids' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_kqdw}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['precision', 'scale', 'iswgd'], 'integer'],
            [['name', 'location_x', 'location_y'], 'string', 'max' => 20],
            [['address', 'dwids'], 'string', 'max' => 50],
            [['wifiname'], 'string', 'max' => 100],
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
            'location_x' => 'Location X',
            'location_y' => 'Location Y',
            'address' => '位置名称',
            'precision' => '允许误差米',
            'scale' => 'Scale',
            'wifiname' => '打卡wifi名',
            'iswgd' => '是否为无固定地点',
            'dwids' => '关联对应ID,实现多点定位',
        ];
    }
}
