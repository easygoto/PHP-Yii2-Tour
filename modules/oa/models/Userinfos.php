<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_userinfos}}".
 *
 * @property int $id
 * @property int $mid 对应主表userinfo.id
 * @property int $sort 排序号
 * @property string $startdt 开始日期
 * @property string $enddt 截止日期
 * @property string $rank 职位
 * @property string $unitname 单位名称
 * @property int $sslx 0工作经历,1教育经历
 */
class Userinfos extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'rank' => ['type' => 'string', 'filter' => 'like'],
        'unitname' => ['type' => 'string', 'filter' => 'like'],
        'sslx' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_userinfos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'sort', 'sslx'], 'integer'],
            [['startdt', 'enddt'], 'safe'],
            [['rank', 'unitname'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '对应主表userinfo.id',
            'sort' => '排序号',
            'startdt' => '开始日期',
            'enddt' => '截止日期',
            'rank' => '职位',
            'unitname' => '单位名称',
            'sslx' => '0工作经历,1教育经历',
        ];
    }
}
