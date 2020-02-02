<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_emailm}}".
 *
 * @property int $id
 * @property int $uid 用户iD
 * @property string $title 主题
 * @property string $content 邮件内容
 * @property int $sendid
 * @property string $sendname 发送人
 * @property string $senddt 发送时间
 * @property string $receid
 * @property string $recename 接收人
 * @property int $isturn @0|草稿,1|已发送
 * @property int $hid @回复id
 * @property int $isfile @是否有附件
 * @property string $applydt
 * @property string $message_id 邮件Id
 * @property string $fromemail 发送人邮件
 * @property string $toemail 发给邮件人
 * @property string $reply_toemail 回复邮件
 * @property string $ccemail 抄送给
 * @property int $size 邮件大小
 * @property string $ccname 抄送给
 * @property string $ccid
 * @property int $type 0内部邮件,1用邮件外发
 * @property string $optdt 操作时间
 * @property int $numoi
 */
class Emailm extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'sendid' => ['type' => 'int', 'filter' => 'like'],
        'sendname' => ['type' => 'string', 'filter' => 'like'],
        'senddt' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'hid' => ['type' => 'int', 'filter' => 'like'],
        'isfile' => ['type' => 'int', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'message_id' => ['type' => 'string', 'filter' => 'like'],
        'fromemail' => ['type' => 'string', 'filter' => 'like'],
        'toemail' => ['type' => 'string', 'filter' => 'like'],
        'reply_toemail' => ['type' => 'string', 'filter' => 'like'],
        'ccemail' => ['type' => 'string', 'filter' => 'like'],
        'size' => ['type' => 'int', 'filter' => 'like'],
        'ccname' => ['type' => 'string', 'filter' => 'like'],
        'ccid' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'numoi' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_emailm}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'sendid', 'isturn', 'hid', 'isfile', 'size', 'type', 'numoi'], 'integer'],
            [['content'], 'string'],
            [['senddt', 'applydt', 'optdt'], 'safe'],
            [['title'], 'string', 'max' => 220],
            [['sendname', 'message_id', 'ccname', 'ccid'], 'string', 'max' => 100],
            [['receid'], 'string', 'max' => 2000],
            [['recename'], 'string', 'max' => 4000],
            [['fromemail', 'toemail', 'reply_toemail', 'ccemail'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '用户iD',
            'title' => '主题',
            'content' => '邮件内容',
            'sendid' => 'Sendid',
            'sendname' => '发送人',
            'senddt' => '发送时间',
            'receid' => 'Receid',
            'recename' => '接收人',
            'isturn' => '@0|草稿,1|已发送',
            'hid' => '@回复id',
            'isfile' => '@是否有附件',
            'applydt' => 'Applydt',
            'message_id' => '邮件Id',
            'fromemail' => '发送人邮件',
            'toemail' => '发给邮件人',
            'reply_toemail' => '回复邮件',
            'ccemail' => '抄送给',
            'size' => '邮件大小',
            'ccname' => '抄送给',
            'ccid' => 'Ccid',
            'type' => '0内部邮件,1用邮件外发',
            'optdt' => '操作时间',
            'numoi' => 'Numoi',
        ];
    }
}
