<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_bookborrow}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 * @property string $explain 说明
 * @property int $status 状态
 * @property int $isturn 是否提交
 * @property int $bookid
 * @property string $bookname 书名
 * @property string $jydt 借阅日期
 * @property string $yjdt 预计归还
 * @property string $ghtime 归还时间
 * @property int $isgh 是否归返
 */
class Bookborrow extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'bookid' => ['type' => 'int', 'filter' => 'like'],
        'bookname' => ['type' => 'string', 'filter' => 'like'],
        'jydt' => ['type' => 'string', 'filter' => 'like'],
        'yjdt' => ['type' => 'string', 'filter' => 'like'],
        'ghtime' => ['type' => 'string', 'filter' => 'like'],
        'isgh' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_bookborrow}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'optid', 'status', 'isturn', 'bookid', 'isgh'], 'integer'],
            [['optdt', 'applydt', 'jydt', 'yjdt', 'ghtime'], 'safe'],
            [['optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['bookname'], 'string', 'max' => 50],
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
            'optdt' => '操作时间',
            'optid' => 'Optid',
            'optname' => '操作人',
            'applydt' => '申请日期',
            'explain' => '说明',
            'status' => '状态',
            'isturn' => '是否提交',
            'bookid' => 'Bookid',
            'bookname' => '书名',
            'jydt' => '借阅日期',
            'yjdt' => '预计归还',
            'ghtime' => '归还时间',
            'isgh' => '是否归返',
        ];
    }
}
