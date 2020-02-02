<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_im_history}}".
 *
 * @property int $id
 * @property string $type
 * @property int $receid
 * @property int $uid
 * @property int $sendid
 * @property string $optdt
 * @property string $cont
 * @property int $stotal
 * @property string $title 推送时标题
 */
class Imhistory extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'sendid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'cont' => ['type' => 'string', 'filter' => 'like'],
        'stotal' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_im_history}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receid', 'uid', 'sendid', 'stotal'], 'integer'],
            [['optdt'], 'safe'],
            [['type'], 'string', 'max' => 10],
            [['cont'], 'string', 'max' => 200],
            [['title'], 'string', 'max' => 50],
            [['type', 'receid', 'uid'], 'unique', 'targetAttribute' => ['type', 'receid', 'uid']],
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
            'receid' => 'Receid',
            'uid' => 'Uid',
            'sendid' => 'Sendid',
            'optdt' => 'Optdt',
            'cont' => 'Cont',
            'stotal' => 'Stotal',
            'title' => '推送时标题',
        ];
    }
}
