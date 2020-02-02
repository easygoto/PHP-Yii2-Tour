<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrkaohen}}".
 *
 * @property int $id
 * @property int $mid 对应主表hrkaohem.id
 * @property int $sort 排序号
 * @property string $pfname 评分名称
 * @property string $pftype 评分人类型
 * @property string $pfren 评分人
 * @property string $pfrenid
 * @property string $pfweight 评分权重
 */
class Hrkaohen extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'pfname' => ['type' => 'string', 'filter' => 'like'],
        'pftype' => ['type' => 'string', 'filter' => 'like'],
        'pfren' => ['type' => 'string', 'filter' => 'like'],
        'pfrenid' => ['type' => 'string', 'filter' => 'like'],
        'pfweight' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrkaohen}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'sort'], 'integer'],
            [['pfweight'], 'number'],
            [['pfname'], 'string', 'max' => 50],
            [['pftype', 'pfren', 'pfrenid'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => '对应主表hrkaohem.id',
            'sort' => '排序号',
            'pfname' => '评分名称',
            'pftype' => '评分人类型',
            'pfren' => '评分人',
            'pfrenid' => 'Pfrenid',
            'pfweight' => '评分权重',
        ];
    }
}
