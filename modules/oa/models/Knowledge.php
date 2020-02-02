<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_knowledge}}".
 *
 * @property int $id
 * @property string $title 标题
 * @property int $typeid 对应分类
 * @property int $sort 排序
 * @property string $content
 * @property string $optdt
 * @property string $optname
 * @property string $adddt
 */
class Knowledge extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'typeid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_knowledge}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeid', 'sort'], 'integer'],
            [['content'], 'string'],
            [['optdt', 'adddt'], 'safe'],
            [['title'], 'string', 'max' => 50],
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
            'title' => '标题',
            'typeid' => '对应分类',
            'sort' => '排序',
            'content' => 'Content',
            'optdt' => 'Optdt',
            'optname' => 'Optname',
            'adddt' => 'Adddt',
        ];
    }
}
