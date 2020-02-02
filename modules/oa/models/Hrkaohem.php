<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrkaohem}}".
 *
 * @property int $id
 * @property string $title 考核名称
 * @property string $startdt 开始日期
 * @property string $enddt 截止日期
 * @property string $receid
 * @property string $recename 对应考核人
 * @property int $optid
 * @property string $optname 操作人
 * @property string $optdt 操作时间
 * @property int $hegfen 合格分数
 * @property int $maxfen 最高分数
 * @property string $pinlv 考核频率
 * @property string $sctime 生成时间
 * @property int $pfsj 评分时间(天)
 * @property int $status 是否启用
 */
class Hrkaohem extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'hegfen' => ['type' => 'int', 'filter' => 'like'],
        'maxfen' => ['type' => 'int', 'filter' => 'like'],
        'pinlv' => ['type' => 'string', 'filter' => 'like'],
        'sctime' => ['type' => 'string', 'filter' => 'like'],
        'pfsj' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_hrkaohem}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['startdt', 'enddt', 'optdt'], 'safe'],
            [['optid', 'hegfen', 'maxfen', 'pfsj', 'status'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['receid', 'recename'], 'string', 'max' => 1000],
            [['optname'], 'string', 'max' => 20],
            [['pinlv'], 'string', 'max' => 50],
            [['sctime'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '考核名称',
            'startdt' => '开始日期',
            'enddt' => '截止日期',
            'receid' => 'Receid',
            'recename' => '对应考核人',
            'optid' => 'Optid',
            'optname' => '操作人',
            'optdt' => '操作时间',
            'hegfen' => '合格分数',
            'maxfen' => '最高分数',
            'pinlv' => '考核频率',
            'sctime' => '生成时间',
            'pfsj' => '评分时间(天)',
            'status' => '是否启用',
        ];
    }
}
