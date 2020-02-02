<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_wotpl}}".
 *
 * @property int $id
 * @property string $template_id 模版消息id
 * @property string $title 模板标题
 * @property string $primary_industry 模板所属行业的一级行业
 * @property string $deputy_industry 模板所属行业的二级行业
 * @property string $content 模板内容
 * @property string $example 模板示例
 * @property string $modename 使用名称
 * @property string $modeparams 参数设置
 * @property int $status 状态
 */
class Wotpl extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'template_id' => ['type' => 'string', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'primary_industry' => ['type' => 'string', 'filter' => 'like'],
        'deputy_industry' => ['type' => 'string', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'example' => ['type' => 'string', 'filter' => 'like'],
        'modename' => ['type' => 'string', 'filter' => 'like'],
        'modeparams' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_wotpl}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['template_id'], 'string', 'max' => 100],
            [['title', 'primary_industry', 'deputy_industry', 'modename'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 1000],
            [['example', 'modeparams'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'template_id' => '模版消息id',
            'title' => '模板标题',
            'primary_industry' => '模板所属行业的一级行业',
            'deputy_industry' => '模板所属行业的二级行业',
            'content' => '模板内容',
            'example' => '模板示例',
            'modename' => '使用名称',
            'modeparams' => '参数设置',
            'status' => '状态',
        ];
    }
}
