<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrsalarm}}".
 *
 * @property int $id
 * @property string $title 模版名称
 * @property string $receid
 * @property string $recename 适用对象
 * @property string $explain
 * @property int $optid
 * @property string $optname
 * @property string $optdt
 * @property string $atype 模版类型
 * @property string $startdt 开始月份
 * @property string $enddt 截止月份
 * @property int $sort 排序号
 * @property int $status 是否启用
 */
class Hrsalarm extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'atype' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_hrsalarm}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optid', 'sort', 'status'], 'integer'],
            [['optdt'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['receid', 'recename', 'explain'], 'string', 'max' => 500],
            [['optname', 'atype', 'startdt', 'enddt'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '模版名称',
            'receid' => 'Receid',
            'recename' => '适用对象',
            'explain' => 'Explain',
            'optid' => 'Optid',
            'optname' => 'Optname',
            'optdt' => 'Optdt',
            'atype' => '模版类型',
            'startdt' => '开始月份',
            'enddt' => '截止月份',
            'sort' => '排序号',
            'status' => '是否启用',
        ];
    }
}
