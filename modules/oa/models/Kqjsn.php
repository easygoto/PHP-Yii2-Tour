<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqjsn}}".
 *
 * @property int $id
 * @property string $num 设备号
 * @property string $name 设备名称
 * @property string $company 公司名
 * @property int $sort 排序号
 * @property string $optdt
 * @property int $status 状态
 * @property string $deptids 部门ID聚合
 * @property string $userids 人员ID聚合
 * @property string $lastdt 最后请求时间
 * @property int $space sd卡剩余空间
 * @property int $memory 剩余内存
 * @property int $usershu 人员数
 * @property int $fingerprintshu 指纹数
 * @property int $headpicshu 头像数量
 * @property int $clockinshu 打卡数
 * @property int $picshu 现场照片数
 * @property string $romver 系统版本
 * @property string $appver 应用版本
 * @property string $model 设备型号
 * @property int $pinpai 品牌0群英,1中控
 * @property string $snip 分配的ip
 * @property string $snport 分配端口号
 */
class Kqjsn extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'company' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'deptids' => ['type' => 'string', 'filter' => 'like'],
        'userids' => ['type' => 'string', 'filter' => 'like'],
        'lastdt' => ['type' => 'string', 'filter' => 'like'],
        'space' => ['type' => 'int', 'filter' => 'like'],
        'memory' => ['type' => 'int', 'filter' => 'like'],
        'usershu' => ['type' => 'int', 'filter' => 'like'],
        'fingerprintshu' => ['type' => 'int', 'filter' => 'like'],
        'headpicshu' => ['type' => 'int', 'filter' => 'like'],
        'clockinshu' => ['type' => 'int', 'filter' => 'like'],
        'picshu' => ['type' => 'int', 'filter' => 'like'],
        'romver' => ['type' => 'string', 'filter' => 'like'],
        'appver' => ['type' => 'string', 'filter' => 'like'],
        'model' => ['type' => 'string', 'filter' => 'like'],
        'pinpai' => ['type' => 'int', 'filter' => 'like'],
        'snip' => ['type' => 'string', 'filter' => 'like'],
        'snport' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_kqjsn}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num'], 'required'],
            [['sort', 'status', 'space', 'memory', 'usershu', 'fingerprintshu', 'headpicshu', 'clockinshu', 'picshu', 'pinpai'], 'integer'],
            [['optdt', 'lastdt'], 'safe'],
            [['userids'], 'string'],
            [['num', 'name', 'company'], 'string', 'max' => 50],
            [['deptids'], 'string', 'max' => 4000],
            [['romver', 'appver', 'model', 'snip'], 'string', 'max' => 30],
            [['snport'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => '设备号',
            'name' => '设备名称',
            'company' => '公司名',
            'sort' => '排序号',
            'optdt' => 'Optdt',
            'status' => '状态',
            'deptids' => '部门ID聚合',
            'userids' => '人员ID聚合',
            'lastdt' => '最后请求时间',
            'space' => 'sd卡剩余空间',
            'memory' => '剩余内存',
            'usershu' => '人员数',
            'fingerprintshu' => '指纹数',
            'headpicshu' => '头像数量',
            'clockinshu' => '打卡数',
            'picshu' => '现场照片数',
            'romver' => '系统版本',
            'appver' => '应用版本',
            'model' => '设备型号',
            'pinpai' => '品牌0群英,1中控',
            'snip' => '分配的ip',
            'snport' => '分配端口号',
        ];
    }
}
