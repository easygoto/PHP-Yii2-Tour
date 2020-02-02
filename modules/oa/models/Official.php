<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_official}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $title 标题
 * @property string $titles 副标题
 * @property string $class 类型
 * @property int $type 0收文单,1发文单
 * @property string $grade 等级
 * @property string $optname
 * @property string $optdt
 * @property int $status 状态
 * @property string $content 内容
 * @property string $receid 来源
 * @property string $recename 发给
 * @property string $applydt 日期
 * @property string $num 编号
 * @property int $optid
 * @property string $explain 说明
 * @property int $isturn 是否提交
 * @property string $filecontid 正文文件Id
 * @property string $zinum 发文字号
 * @property string $unitname 主送单位
 * @property string $unitsame 发文单位
 * @property string $miji 公文密级
 * @property string $laidt 来文日期
 * @property string $chaoname 抄送单位
 * @property string $zuncheng 正文上称呼
 * @property int $thid 对应officialhong里id
 * @property int $yzid 对应印章sealapl里Id
 * @property int $ffid 对应分发表officialfa的Id
 * @property string $enddt 截止日期
 * @property string $startdt 查阅日期
 */
class Official extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'titles' => ['type' => 'string', 'filter' => 'like'],
        'class' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'grade' => ['type' => 'string', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'content' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'filecontid' => ['type' => 'string', 'filter' => 'like'],
        'zinum' => ['type' => 'string', 'filter' => 'like'],
        'unitname' => ['type' => 'string', 'filter' => 'like'],
        'unitsame' => ['type' => 'string', 'filter' => 'like'],
        'miji' => ['type' => 'string', 'filter' => 'like'],
        'laidt' => ['type' => 'string', 'filter' => 'like'],
        'chaoname' => ['type' => 'string', 'filter' => 'like'],
        'zuncheng' => ['type' => 'string', 'filter' => 'like'],
        'thid' => ['type' => 'int', 'filter' => 'like'],
        'yzid' => ['type' => 'int', 'filter' => 'like'],
        'ffid' => ['type' => 'int', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_official}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'type', 'status', 'optid', 'isturn', 'thid', 'yzid', 'ffid'], 'integer'],
            [['optdt', 'applydt', 'laidt', 'enddt', 'startdt'], 'safe'],
            [['content'], 'string'],
            [['title', 'titles'], 'string', 'max' => 255],
            [['class', 'grade'], 'string', 'max' => 10],
            [['optname'], 'string', 'max' => 20],
            [['receid', 'recename', 'unitname', 'unitsame', 'chaoname', 'zuncheng'], 'string', 'max' => 200],
            [['num', 'filecontid', 'zinum'], 'string', 'max' => 30],
            [['explain'], 'string', 'max' => 500],
            [['miji'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'title' => '标题',
            'titles' => '副标题',
            'class' => '类型',
            'type' => '0收文单,1发文单',
            'grade' => '等级',
            'optname' => 'Optname',
            'optdt' => 'Optdt',
            'status' => '状态',
            'content' => '内容',
            'receid' => '来源',
            'recename' => '发给',
            'applydt' => '日期',
            'num' => '编号',
            'optid' => 'Optid',
            'explain' => '说明',
            'isturn' => '是否提交',
            'filecontid' => '正文文件Id',
            'zinum' => '发文字号',
            'unitname' => '主送单位',
            'unitsame' => '发文单位',
            'miji' => '公文密级',
            'laidt' => '来文日期',
            'chaoname' => '抄送单位',
            'zuncheng' => '正文上称呼',
            'thid' => '对应officialhong里id',
            'yzid' => '对应印章sealapl里Id',
            'ffid' => '对应分发表officialfa的Id',
            'enddt' => '截止日期',
            'startdt' => '查阅日期',
        ];
    }
}
