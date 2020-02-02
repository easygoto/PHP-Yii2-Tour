<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_chargems}}".
 *
 * @property int $id
 * @property int $type
 * @property int $mid
 * @property string $optdt
 * @property string $updatedt
 * @property string $key
 * @property int $modeid 对应安装模块Id
 */
class Chargems extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'updatedt' => ['type' => 'string', 'filter' => 'like'],
        'key' => ['type' => 'string', 'filter' => 'like'],
        'modeid' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_chargems}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'mid', 'modeid'], 'integer'],
            [['optdt', 'updatedt'], 'safe'],
            [['key'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'mid' => 'Mid',
            'optdt' => 'Optdt',
            'updatedt' => 'Updatedt',
            'key' => 'Key',
            'modeid' => '对应安装模块Id',
        ];
    }
}
