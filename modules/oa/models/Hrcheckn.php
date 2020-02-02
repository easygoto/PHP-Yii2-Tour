<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrcheckn}}".
 *
 * @property int $id
 * @property string $itemname 评分项目
 * @property string $pfname 评分名称
 * @property int $mid 对应主表hrcheck.id
 * @property int $sort 排序号
 * @property int $sid 对应hrchecks.id
 * @property int $fenshu 评分分数
 * @property string $weight 权重
 * @property int $optid
 * @property string $optname 评分人
 * @property string $optdt 操作时间
 * @property string $defen 最后得分
 * @property int $pfid 关联评分hrkaohen.Id
 */
class Hrcheckn extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'itemname' => ['type' => 'string', 'filter' => 'like'],
        'pfname' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'sid' => ['type' => 'int', 'filter' => 'like'],
        'fenshu' => ['type' => 'int', 'filter' => 'like'],
        'weight' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'defen' => ['type' => 'string', 'filter' => 'like'],
        'pfid' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_hrcheckn}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'sort', 'sid', 'fenshu', 'optid', 'pfid'], 'integer'],
            [['weight', 'defen'], 'number'],
            [['optdt'], 'safe'],
            [['itemname', 'pfname'], 'string', 'max' => 100],
            [['optname'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'itemname' => '评分项目',
            'pfname' => '评分名称',
            'mid' => '对应主表hrcheck.id',
            'sort' => '排序号',
            'sid' => '对应hrchecks.id',
            'fenshu' => '评分分数',
            'weight' => '权重',
            'optid' => 'Optid',
            'optname' => '评分人',
            'optdt' => '操作时间',
            'defen' => '最后得分',
            'pfid' => '关联评分hrkaohen.Id',
        ];
    }
}
