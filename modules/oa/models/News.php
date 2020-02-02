<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_news}}".
 *
 * @property int $id
 * @property string $title
 * @property string $optdt
 * @property string $typename
 * @property string $content
 * @property string $url
 * @property string $receid 接收人Id
 * @property string $recename
 * @property int $optid
 * @property string $optname
 * @property string $enddt 截止时间
 * @property string $startdt 开始时间
 * @property string $zuozhe 发布者
 * @property string $indate 日期
 * @property int $status 状态
 * @property string $fengmian 封面图片
 * @property int $mintou 至少投票
 * @property int $maxtou 最多投投票0不限制
 * @property int $issms 是否发短信
 * @property int $istop 排序号越大越靠前
 */
class News extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'typename' => ['type' => 'string', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'url' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'zuozhe' => ['type' => 'string', 'filter' => 'like'],
        'indate' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'fengmian' => ['type' => 'string', 'filter' => 'like'],
        'mintou' => ['type' => 'int', 'filter' => 'like'],
        'maxtou' => ['type' => 'int', 'filter' => 'like'],
        'issms' => ['type' => 'int', 'filter' => 'like'],
        'istop' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optdt', 'enddt', 'startdt', 'indate'], 'safe'],
            [['content'], 'string'],
            [['optid', 'status', 'mintou', 'maxtou', 'issms', 'istop'], 'integer'],
            [['title', 'url'], 'string', 'max' => 200],
            [['typename', 'optname'], 'string', 'max' => 20],
            [['receid'], 'string', 'max' => 2000],
            [['recename'], 'string', 'max' => 4000],
            [['zuozhe'], 'string', 'max' => 30],
            [['fengmian'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'optdt' => 'Optdt',
            'typename' => 'Typename',
            'content' => 'Content',
            'url' => 'Url',
            'receid' => '接收人Id',
            'recename' => 'Recename',
            'optid' => 'Optid',
            'optname' => 'Optname',
            'enddt' => '截止时间',
            'startdt' => '开始时间',
            'zuozhe' => '发布者',
            'indate' => '日期',
            'status' => '状态',
            'fengmian' => '封面图片',
            'mintou' => '至少投票',
            'maxtou' => '最多投投票0不限制',
            'issms' => '是否发短信',
            'istop' => '排序号越大越靠前',
        ];
    }
}
