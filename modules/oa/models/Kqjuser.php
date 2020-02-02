<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqjuser}}".
 *
 * @property int $id
 * @property int $snid 设备ID
 * @property int $uid 用户ID
 * @property string $fingerprint1 指纹1
 * @property string $fingerprint2 指纹2
 * @property string $headpic 头像
 */
class Kqjuser extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'snid' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'fingerprint1' => ['type' => 'string', 'filter' => 'like'],
        'fingerprint2' => ['type' => 'string', 'filter' => 'like'],
        'headpic' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_kqjuser}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['snid', 'uid'], 'integer'],
            [['fingerprint1', 'fingerprint2'], 'string'],
            [['headpic'], 'string', 'max' => 100],
            [['snid', 'uid'], 'unique', 'targetAttribute' => ['snid', 'uid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'snid' => '设备ID',
            'uid' => '用户ID',
            'fingerprint1' => '指纹1',
            'fingerprint2' => '指纹2',
            'headpic' => '头像',
        ];
    }
}
