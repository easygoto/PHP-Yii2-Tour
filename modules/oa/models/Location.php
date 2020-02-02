<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_location}}".
 *
 * @property int $id
 * @property string $user
 * @property int $uid
 * @property string $agentid 应用Id
 * @property string $optdt
 * @property string $location_x 地理位置纬度
 * @property string $location_y 地理位置经度 
 * @property int $scale 地图缩放大小
 * @property string $label 地理位置
 * @property string $msgid
 * @property int $precision 地理位置精度
 * @property int $type 0普通,1事件,2企业微信定位
 * @property string $explain 说明
 * @property string $imgpath 相关图片
 */
class Location extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'user' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'agentid' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'location_x' => ['type' => 'string', 'filter' => 'like'],
        'location_y' => ['type' => 'string', 'filter' => 'like'],
        'scale' => ['type' => 'int', 'filter' => 'like'],
        'label' => ['type' => 'string', 'filter' => 'like'],
        'msgid' => ['type' => 'string', 'filter' => 'like'],
        'precision' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'imgpath' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_location}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'scale', 'precision', 'type'], 'integer'],
            [['optdt'], 'safe'],
            [['user', 'location_x', 'location_y'], 'string', 'max' => 30],
            [['agentid'], 'string', 'max' => 20],
            [['label', 'msgid', 'explain'], 'string', 'max' => 50],
            [['imgpath'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'uid' => 'Uid',
            'agentid' => '应用Id',
            'optdt' => 'Optdt',
            'location_x' => '地理位置纬度',
            'location_y' => '地理位置经度 ',
            'scale' => '地图缩放大小',
            'label' => '地理位置',
            'msgid' => 'Msgid',
            'precision' => '地理位置精度',
            'type' => '0普通,1事件,2企业微信定位',
            'explain' => '说明',
            'imgpath' => '相关图片',
        ];
    }
}
