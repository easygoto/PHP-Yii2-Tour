<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_files}}".
 *
 * @property int $id
 * @property string $table
 * @property int $mid
 * @property int $fileid 关联file.id
 * @property int $optid
 */
class Files extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'table' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'fileid' => ['type' => 'int', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_files}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'fileid', 'optid'], 'integer'],
            [['table'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table' => 'Table',
            'mid' => 'Mid',
            'fileid' => '关联file.id',
            'optid' => 'Optid',
        ];
    }
}
