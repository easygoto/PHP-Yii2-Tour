<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_vcard}}".
 *
 * @property int $id
 * @property string $name 姓名
 * @property string $mobile 手机号
 * @property string $optdt
 * @property int $uid
 * @property string $tel 电话
 * @property string $email 邮箱
 * @property string $gname 所在组名
 * @property string $optname 操作人
 * @property string $address 地址
 * @property int $sort 排序号
 * @property string $unitname 单位名称
 * @property string $sex 性别
 */
class Vcard extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'mobile' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'tel' => ['type' => 'string', 'filter' => 'like'],
        'email' => ['type' => 'string', 'filter' => 'like'],
        'gname' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'address' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'unitname' => ['type' => 'string', 'filter' => 'like'],
        'sex' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_vcard}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optdt'], 'safe'],
            [['uid', 'sort'], 'integer'],
            [['name', 'gname', 'optname'], 'string', 'max' => 20],
            [['mobile', 'email', 'address'], 'string', 'max' => 100],
            [['tel', 'unitname'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'mobile' => '手机号',
            'optdt' => 'Optdt',
            'uid' => 'Uid',
            'tel' => '电话',
            'email' => '邮箱',
            'gname' => '所在组名',
            'optname' => '操作人',
            'address' => '地址',
            'sort' => '排序号',
            'unitname' => '单位名称',
            'sex' => '性别',
        ];
    }
}
