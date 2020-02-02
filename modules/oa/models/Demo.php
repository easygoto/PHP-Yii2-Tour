<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_demo}}".
 *
 * @property int $id
 * @property string $sheng 省
 * @property string $shi 市
 * @property string $xian 县(区)
 * @property string $applydt 申请日期
 * @property int $uid
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property string $explain 说明
 * @property int $status 状态
 * @property int $isturn 是否提交
 * @property string $tanxuan 弹出下来单选
 * @property string $tanxuancheck 弹框下拉多选
 * @property string $upfile1 文件上传1
 * @property string $upfile2 文件上传2
 * @property string $testfirs 测试字段
 * @property string $custname 客户
 * @property int $custid 客户id
 * @property string $money 金额
 */
class Demo extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'sheng' => ['type' => 'string', 'filter' => 'like'],
        'shi' => ['type' => 'string', 'filter' => 'like'],
        'xian' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'tanxuan' => ['type' => 'string', 'filter' => 'like'],
        'tanxuancheck' => ['type' => 'string', 'filter' => 'like'],
        'upfile1' => ['type' => 'string', 'filter' => 'like'],
        'upfile2' => ['type' => 'string', 'filter' => 'like'],
        'testfirs' => ['type' => 'string', 'filter' => 'like'],
        'custname' => ['type' => 'string', 'filter' => 'like'],
        'custid' => ['type' => 'int', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_demo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applydt', 'optdt'], 'safe'],
            [['uid', 'optid', 'status', 'isturn', 'custid'], 'integer'],
            [['money'], 'number'],
            [['sheng', 'shi', 'xian', 'tanxuan', 'tanxuancheck', 'upfile1', 'upfile2', 'testfirs'], 'string', 'max' => 50],
            [['optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['custname'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sheng' => '省',
            'shi' => '市',
            'xian' => '县(区)',
            'applydt' => '申请日期',
            'uid' => 'Uid',
            'optdt' => '操作时间',
            'optid' => 'Optid',
            'optname' => '操作人',
            'explain' => '说明',
            'status' => '状态',
            'isturn' => '是否提交',
            'tanxuan' => '弹出下来单选',
            'tanxuancheck' => '弹框下拉多选',
            'upfile1' => '文件上传1',
            'upfile2' => '文件上传2',
            'testfirs' => '测试字段',
            'custname' => '客户',
            'custid' => '客户id',
            'money' => '金额',
        ];
    }
}
