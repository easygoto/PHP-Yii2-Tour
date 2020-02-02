<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_seal}}".
 *
 * @property int $id
 * @property string $name 印章名称
 * @property string $type 印章类型
 * @property string $bgname 保管人
 * @property string $bgid
 * @property string $optdt
 * @property int $sort 排序号
 * @property string $sealimg 对应印章图片
 * @property string $explain 说明
 * @property string $startdt 签发日期
 * @property string $enddt 截止日期
 */
class Seal extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'bgname' => ['type' => 'string', 'filter' => 'like'],
        'bgid' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'sealimg' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_seal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optdt', 'startdt', 'enddt'], 'safe'],
            [['sort'], 'integer'],
            [['name', 'bgname', 'bgid'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 10],
            [['sealimg'], 'string', 'max' => 100],
            [['explain'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '印章名称',
            'type' => '印章类型',
            'bgname' => '保管人',
            'bgid' => 'Bgid',
            'optdt' => 'Optdt',
            'sort' => '排序号',
            'sealimg' => '对应印章图片',
            'explain' => '说明',
            'startdt' => '签发日期',
            'enddt' => '截止日期',
        ];
    }
}
