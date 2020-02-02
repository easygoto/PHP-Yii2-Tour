<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_knowtiku}}".
 *
 * @property int $id
 * @property string $title 标题
 * @property int $typeid
 * @property int $type 0单选,1多选
 * @property string $ana 答案A
 * @property string $anb 答案B
 * @property string $anc 答案C
 * @property string $and 答案D
 * @property string $answer
 * @property int $sort
 * @property string $adddt
 * @property string $optdt
 * @property string $explain
 * @property int $status 状态
 * @property string $content
 * @property int $optid
 * @property string $imgurl 相关图片地址
 */
class Knowtiku extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'typeid' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'ana' => ['type' => 'string', 'filter' => 'like'],
        'anb' => ['type' => 'string', 'filter' => 'like'],
        'anc' => ['type' => 'string', 'filter' => 'like'],
        'and' => ['type' => 'string', 'filter' => 'like'],
        'answer' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'imgurl' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_knowtiku}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeid', 'type', 'sort', 'status', 'optid'], 'integer'],
            [['adddt', 'optdt'], 'safe'],
            [['title', 'explain'], 'string', 'max' => 500],
            [['ana', 'anb', 'anc', 'and'], 'string', 'max' => 300],
            [['answer'], 'string', 'max' => 10],
            [['content'], 'string', 'max' => 1000],
            [['imgurl'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'typeid' => 'Typeid',
            'type' => '0单选,1多选',
            'ana' => '答案A',
            'anb' => '答案B',
            'anc' => '答案C',
            'and' => '答案D',
            'answer' => 'Answer',
            'sort' => 'Sort',
            'adddt' => 'Adddt',
            'optdt' => 'Optdt',
            'explain' => 'Explain',
            'status' => '状态',
            'content' => 'Content',
            'optid' => 'Optid',
            'imgurl' => '相关图片地址',
        ];
    }
}
