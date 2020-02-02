<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_subscribeinfo}}".
 *
 * @property int $id
 * @property int $mid 对应定ID
 * @property string $title 标题
 * @property string $cont 内容
 * @property string $optdt
 * @property string $filepath 文件路径
 * @property string $receid 发送给
 * @property string $recename 对应人
 */
class Subscribeinfo extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'cont' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'filepath' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_subscribeinfo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid'], 'integer'],
            [['optdt'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['cont', 'filepath', 'recename'], 'string', 'max' => 200],
            [['receid'], 'string', 'max' => 4000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '对应定ID',
            'title' => '标题',
            'cont' => '内容',
            'optdt' => 'Optdt',
            'filepath' => '文件路径',
            'receid' => '发送给',
            'recename' => '对应人',
        ];
    }
}
