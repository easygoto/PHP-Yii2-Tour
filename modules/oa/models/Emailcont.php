<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_email_cont}}".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $body 内容
 * @property string $receid
 * @property string $recename 接收人
 * @property string $receemail 接收邮件
 * @property string $optdt
 * @property int $optid
 * @property string $optname 添加人
 * @property int $status 0待发送,1成功,2失败
 * @property string $senddt 发送时间
 * @property string $ccname 抄送给
 * @property string $ccemail 抄送邮件
 * @property string $attachpath 附件路径
 * @property string $attachname 福建名称
 */
class Emailcont extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'body' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'receemail' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'senddt' => ['type' => 'string', 'filter' => 'like'],
        'ccname' => ['type' => 'string', 'filter' => 'like'],
        'ccemail' => ['type' => 'string', 'filter' => 'like'],
        'attachpath' => ['type' => 'string', 'filter' => 'like'],
        'attachname' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_email_cont}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['optdt', 'senddt'], 'safe'],
            [['optid', 'status'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['receid', 'recename', 'receemail', 'ccname', 'ccemail', 'attachpath', 'attachname'], 'string', 'max' => 500],
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
            'title' => '标题',
            'body' => '内容',
            'receid' => 'Receid',
            'recename' => '接收人',
            'receemail' => '接收邮件',
            'optdt' => 'Optdt',
            'optid' => 'Optid',
            'optname' => '添加人',
            'status' => '0待发送,1成功,2失败',
            'senddt' => '发送时间',
            'ccname' => '抄送给',
            'ccemail' => '抄送邮件',
            'attachpath' => '附件路径',
            'attachname' => '福建名称',
        ];
    }
}
