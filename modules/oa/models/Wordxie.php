<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_wordxie}}".
 *
 * @property int $id
 * @property string $name 文档名称
 * @property string $fenlei 分类
 * @property string $wtype 文档类型
 * @property string $optname
 * @property int $optid
 * @property string $optdt
 * @property string $xiename 协作人
 * @property string $xienameid
 * @property string $recename 可查看人
 * @property string $receid
 * @property int $status
 * @property int $fileid
 * @property string $explian 说明
 */
class Wordxie extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'fenlei' => ['type' => 'string', 'filter' => 'like'],
        'wtype' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'xiename' => ['type' => 'string', 'filter' => 'like'],
        'xienameid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'fileid' => ['type' => 'int', 'filter' => 'like'],
        'explian' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_wordxie}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optid', 'status', 'fileid'], 'integer'],
            [['optdt'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['fenlei'], 'string', 'max' => 50],
            [['wtype', 'optname'], 'string', 'max' => 20],
            [['xiename', 'xienameid', 'recename', 'receid'], 'string', 'max' => 500],
            [['explian'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '文档名称',
            'fenlei' => '分类',
            'wtype' => '文档类型',
            'optname' => 'Optname',
            'optid' => 'Optid',
            'optdt' => 'Optdt',
            'xiename' => '协作人',
            'xienameid' => 'Xienameid',
            'recename' => '可查看人',
            'receid' => 'Receid',
            'status' => 'Status',
            'fileid' => 'Fileid',
            'explian' => '说明',
        ];
    }
}
