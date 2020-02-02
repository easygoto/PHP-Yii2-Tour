<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_im_mess}}".
 *
 * @property int $id
 * @property string $optdt
 * @property int $zt 状态
 * @property string $cont 内容
 * @property int $sendid
 * @property int $receid 接收
 * @property string $receuid 接收用户id
 * @property string $type 信息类型
 * @property string $url 相关地址
 * @property int $fileid 对应文件Id
 * @property string $msgid
 */
class Immess extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'zt' => ['type' => 'int', 'filter' => 'like'],
        'cont' => ['type' => 'string', 'filter' => 'like'],
        'sendid' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'int', 'filter' => 'like'],
        'receuid' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'string', 'filter' => 'like'],
        'url' => ['type' => 'string', 'filter' => 'like'],
        'fileid' => ['type' => 'int', 'filter' => 'like'],
        'msgid' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_im_mess}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['optdt'], 'safe'],
            [['zt', 'sendid', 'receid', 'fileid'], 'integer'],
            [['cont', 'receuid'], 'string', 'max' => 4000],
            [['type'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 1000],
            [['msgid'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'optdt' => 'Optdt',
            'zt' => '状态',
            'cont' => '内容',
            'sendid' => 'Sendid',
            'receid' => '接收',
            'receuid' => '接收用户id',
            'type' => '信息类型',
            'url' => '相关地址',
            'fileid' => '对应文件Id',
            'msgid' => 'Msgid',
        ];
    }
}
