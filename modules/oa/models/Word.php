<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_word}}".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $optid
 * @property string $optname
 * @property int $fileid
 * @property string $shateid
 * @property string $shate 分享给我的
 * @property string $optdt
 * @property int $typeid 对应类型
 * @property int $cid 文档分区ID
 * @property int $type 0文件,1文件夹
 * @property int $sort 排序号
 */
class Word extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'fileid' => ['type' => 'int', 'filter' => 'like'],
        'shateid' => ['type' => 'string', 'filter' => 'like'],
        'shate' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'typeid' => ['type' => 'int', 'filter' => 'like'],
        'cid' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_word}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optid', 'fileid', 'typeid', 'cid', 'type', 'sort'], 'integer'],
            [['optdt'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['optname'], 'string', 'max' => 20],
            [['shateid', 'shate'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'optid' => 'Optid',
            'optname' => 'Optname',
            'fileid' => 'Fileid',
            'shateid' => 'Shateid',
            'shate' => '分享给我的',
            'optdt' => 'Optdt',
            'typeid' => '对应类型',
            'cid' => '文档分区ID',
            'type' => '0文件,1文件夹',
            'sort' => '排序号',
        ];
    }
}
