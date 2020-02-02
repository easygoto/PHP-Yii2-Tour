<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_editrecord}}".
 *
 * @property int $id
 * @property string $fieldsname 字段名称
 * @property string $oldval 原来值
 * @property string $newval 新值
 * @property string $table
 * @property int $mid
 * @property string $optdt 操作时间
 * @property int $optid 操作人Id
 * @property string $optname 操作人
 * @property int $editci 第几次修改记录
 */
class Editrecord extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'fieldsname' => ['type' => 'string', 'filter' => 'like'],
        'oldval' => ['type' => 'string', 'filter' => 'like'],
        'newval' => ['type' => 'string', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'editci' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_editrecord}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'optid', 'editci'], 'integer'],
            [['optdt'], 'safe'],
            [['fieldsname'], 'string', 'max' => 50],
            [['oldval', 'newval'], 'string', 'max' => 1000],
            [['table'], 'string', 'max' => 30],
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
            'fieldsname' => '字段名称',
            'oldval' => '原来值',
            'newval' => '新值',
            'table' => 'Table',
            'mid' => 'Mid',
            'optdt' => '操作时间',
            'optid' => '操作人Id',
            'optname' => '操作人',
            'editci' => '第几次修改记录',
        ];
    }
}
