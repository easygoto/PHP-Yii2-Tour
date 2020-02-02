<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqdkjl}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $dkdt
 * @property string $optdt
 * @property int $type 0在线打卡,1考勤机,2手机定位,3手动添加,4异常添加,5数据导入,6接口导入
 * @property string $address 定位地址
 * @property string $lat 纬度
 * @property string $lng 经度
 * @property int $accuracy 精确范围
 * @property string $ip
 * @property string $mac
 * @property string $explain
 * @property string $imgpath 相关图片
 * @property int $snid 考勤机设备id
 * @property int $sntype 考勤机打卡方式0密码,1指纹,2刷卡
 */
class Kqdkjl extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'dkdt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'lat' => ['type' => 'string', 'filter' => 'like'],
        'lng' => ['type' => 'string', 'filter' => 'like'],
        'accuracy' => ['type' => 'int', 'filter' => 'like'],
        'ip' => ['type' => 'string', 'filter' => 'like'],
        'mac' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'imgpath' => ['type' => 'string', 'filter' => 'like'],
        'snid' => ['type' => 'int', 'filter' => 'like'],
        'sntype' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_kqdkjl}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'type', 'accuracy', 'snid', 'sntype'], 'integer'],
            [['dkdt', 'optdt'], 'safe'],
            [['address'], 'string', 'max' => 50],
            [['lat', 'lng'], 'string', 'max' => 20],
            [['ip', 'mac'], 'string', 'max' => 30],
            [['explain'], 'string', 'max' => 200],
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
            'uid' => 'Uid',
            'dkdt' => 'Dkdt',
            'optdt' => 'Optdt',
            'type' => '0在线打卡,1考勤机,2手机定位,3手动添加,4异常添加,5数据导入,6接口导入',
            'address' => '定位地址',
            'lat' => '纬度',
            'lng' => '经度',
            'accuracy' => '精确范围',
            'ip' => 'Ip',
            'mac' => 'Mac',
            'explain' => 'Explain',
            'imgpath' => '相关图片',
            'snid' => '考勤机设备id',
            'sntype' => '考勤机打卡方式0密码,1指纹,2刷卡',
        ];
    }
}
