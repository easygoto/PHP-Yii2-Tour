<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_knowtrais}}".
 *
 * @property int $id
 * @property int $mid
 * @property int $uid
 * @property string $kssdt 考试时间
 * @property string $ksedt 考试结束时间
 * @property int $fenshu 得分
 * @property int $kstime 考试时间(秒数)
 * @property int $isks 是否已考试
 * @property string $tkids 考试题目id
 * @property string $dyids 我做题得到答案
 * @property string $dyjgs 答题结果0未答,1正确,2错误
 */
class Knowtrais extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'kssdt' => ['type' => 'string', 'filter' => 'like'],
        'ksedt' => ['type' => 'string', 'filter' => 'like'],
        'fenshu' => ['type' => 'int', 'filter' => 'like'],
        'kstime' => ['type' => 'int', 'filter' => 'like'],
        'isks' => ['type' => 'int', 'filter' => 'like'],
        'tkids' => ['type' => 'string', 'filter' => 'like'],
        'dyids' => ['type' => 'string', 'filter' => 'like'],
        'dyjgs' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_knowtrais}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'uid', 'fenshu', 'kstime', 'isks'], 'integer'],
            [['kssdt', 'ksedt'], 'safe'],
            [['tkids'], 'string', 'max' => 2000],
            [['dyids', 'dyjgs'], 'string', 'max' => 1000],
            [['mid', 'uid'], 'unique', 'targetAttribute' => ['mid', 'uid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => 'Mid',
            'uid' => 'Uid',
            'kssdt' => '考试时间',
            'ksedt' => '考试结束时间',
            'fenshu' => '得分',
            'kstime' => '考试时间(秒数)',
            'isks' => '是否已考试',
            'tkids' => '考试题目id',
            'dyids' => '我做题得到答案',
            'dyjgs' => '答题结果0未答,1正确,2错误',
        ];
    }
}
