<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_book}}".
 *
 * @property int $id
 * @property string $title 书名
 * @property int $typeid 对应分类
 * @property string $num 编号
 * @property string $author 作者
 * @property string $chuban 出版社
 * @property string $cbdt 出版日期
 * @property string $price 价格
 * @property string $weizhi 存放位置
 * @property int $shul 数量
 * @property string $adddt
 * @property string $optdt
 * @property string $optname 操作人
 * @property int $optid
 * @property string $explain 说明
 * @property string $isbn
 * @property int $jieshu 被借阅数
 */
class Book extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'typeid' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'author' => ['type' => 'string', 'filter' => 'like'],
        'chuban' => ['type' => 'string', 'filter' => 'like'],
        'cbdt' => ['type' => 'string', 'filter' => 'like'],
        'price' => ['type' => 'string', 'filter' => 'like'],
        'weizhi' => ['type' => 'string', 'filter' => 'like'],
        'shul' => ['type' => 'int', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'isbn' => ['type' => 'string', 'filter' => 'like'],
        'jieshu' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_book}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeid', 'shul', 'optid', 'jieshu'], 'integer'],
            [['cbdt', 'adddt', 'optdt'], 'safe'],
            [['price'], 'number'],
            [['title', 'num', 'chuban', 'weizhi'], 'string', 'max' => 50],
            [['author', 'optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['isbn'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '书名',
            'typeid' => '对应分类',
            'num' => '编号',
            'author' => '作者',
            'chuban' => '出版社',
            'cbdt' => '出版日期',
            'price' => '价格',
            'weizhi' => '存放位置',
            'shul' => '数量',
            'adddt' => 'Adddt',
            'optdt' => 'Optdt',
            'optname' => '操作人',
            'optid' => 'Optid',
            'explain' => '说明',
            'isbn' => 'Isbn',
            'jieshu' => '被借阅数',
        ];
    }
}
