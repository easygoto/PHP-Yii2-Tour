<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_godepot}}".
 *
 * @property int $id
 * @property string $depotname 仓库名称
 * @property string $depotaddress 仓库地址
 * @property string $cgname 仓库管理员
 * @property string $cgid 仓库管理员的ID
 * @property string $depotexplain 说明
 * @property int $sort 排序号
 * @property string $depotnum 仓库编号
 * @property int $wpshu 物品数
 */
class Godepot extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'depotname' => ['type' => 'string', 'filter' => 'like'],
        'depotaddress' => ['type' => 'string', 'filter' => 'like'],
        'cgname' => ['type' => 'string', 'filter' => 'like'],
        'cgid' => ['type' => 'string', 'filter' => 'like'],
        'depotexplain' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'depotnum' => ['type' => 'string', 'filter' => 'like'],
        'wpshu' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_godepot}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'wpshu'], 'integer'],
            [['depotname', 'cgname', 'cgid', 'depotnum'], 'string', 'max' => 50],
            [['depotaddress'], 'string', 'max' => 100],
            [['depotexplain'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'depotname' => '仓库名称',
            'depotaddress' => '仓库地址',
            'cgname' => '仓库管理员',
            'cgid' => '仓库管理员的ID',
            'depotexplain' => '说明',
            'sort' => '排序号',
            'depotnum' => '仓库编号',
            'wpshu' => '物品数',
        ];
    }
}
