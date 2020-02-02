<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrsalary}}".
 *
 * @property int $id
 * @property int $uid
 * @property int $xuid
 * @property string $uname 对应人
 * @property string $udeptname 对应人员部门
 * @property string $ranking 职位
 * @property string $optdt 操作时间
 * @property int $optid
 * @property string $optname 操作人
 * @property string $applydt 申请日期
 * @property string $explain 说明
 * @property int $status 状态
 * @property int $isturn 是否提交
 * @property string $month 月份
 * @property string $base 基本工资
 * @property string $money 实发
 * @property string $mones 应发工资
 * @property string $postjt 职务津贴
 * @property string $skilljt 技能津贴
 * @property string $travelbt 交通补贴
 * @property string $telbt 通信补贴
 * @property string $reward 奖励
 * @property string $punish 处罚
 * @property string $socials 个人社保
 * @property string $socialsunit 单位社保缴费
 * @property string $taxes 个人所得税
 * @property string $taxbase 个税起征点
 * @property int $ispay 是否发放
 * @property string $otherzj 其它增加
 * @property string $otherjs 其它减少
 * @property int $cidao 迟到(次)
 * @property string $cidaos 迟到处罚
 * @property int $zaotui 早退(次)
 * @property string $zaotuis 早退处罚
 * @property int $leave 请假(小时)
 * @property string $leaves 请假减少
 * @property int $jiaban 加班(小时)
 * @property string $jiabans 加班补贴
 * @property int $weidk 未打卡(次)
 * @property string $weidks 未打卡减少
 * @property string $jxjs 绩效基数
 * @property string $jxxs 绩效系数
 * @property string $jxdf 绩效打分
 * @property string $jtpost 绩效收入
 * @property string $ysbtime 应上班天数
 * @property string $zsbtime 已上班天数
 * @property string $gonggeren 公积金个人
 * @property string $gongunit 公积金单位
 * @property string $foodbt 餐补贴
 * @property string $hotbt 高温津贴
 * @property string $dnbt 电脑补贴
 * @property string $jiansr 计件收入
 * @property string $otherbt 其他补贴
 */
class Hrsalary extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'xuid' => ['type' => 'int', 'filter' => 'like'],
        'uname' => ['type' => 'string', 'filter' => 'like'],
        'udeptname' => ['type' => 'string', 'filter' => 'like'],
        'ranking' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'applydt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'isturn' => ['type' => 'int', 'filter' => 'like'],
        'month' => ['type' => 'string', 'filter' => 'like'],
        'base' => ['type' => 'string', 'filter' => 'like'],
        'money' => ['type' => 'string', 'filter' => 'like'],
        'mones' => ['type' => 'string', 'filter' => 'like'],
        'postjt' => ['type' => 'string', 'filter' => 'like'],
        'skilljt' => ['type' => 'string', 'filter' => 'like'],
        'travelbt' => ['type' => 'string', 'filter' => 'like'],
        'telbt' => ['type' => 'string', 'filter' => 'like'],
        'reward' => ['type' => 'string', 'filter' => 'like'],
        'punish' => ['type' => 'string', 'filter' => 'like'],
        'socials' => ['type' => 'string', 'filter' => 'like'],
        'socialsunit' => ['type' => 'string', 'filter' => 'like'],
        'taxes' => ['type' => 'string', 'filter' => 'like'],
        'taxbase' => ['type' => 'string', 'filter' => 'like'],
        'ispay' => ['type' => 'int', 'filter' => 'like'],
        'otherzj' => ['type' => 'string', 'filter' => 'like'],
        'otherjs' => ['type' => 'string', 'filter' => 'like'],
        'cidao' => ['type' => 'int', 'filter' => 'like'],
        'cidaos' => ['type' => 'string', 'filter' => 'like'],
        'zaotui' => ['type' => 'int', 'filter' => 'like'],
        'zaotuis' => ['type' => 'string', 'filter' => 'like'],
        'leave' => ['type' => 'int', 'filter' => 'like'],
        'leaves' => ['type' => 'string', 'filter' => 'like'],
        'jiaban' => ['type' => 'int', 'filter' => 'like'],
        'jiabans' => ['type' => 'string', 'filter' => 'like'],
        'weidk' => ['type' => 'int', 'filter' => 'like'],
        'weidks' => ['type' => 'string', 'filter' => 'like'],
        'jxjs' => ['type' => 'string', 'filter' => 'like'],
        'jxxs' => ['type' => 'string', 'filter' => 'like'],
        'jxdf' => ['type' => 'string', 'filter' => 'like'],
        'jtpost' => ['type' => 'string', 'filter' => 'like'],
        'ysbtime' => ['type' => 'string', 'filter' => 'like'],
        'zsbtime' => ['type' => 'string', 'filter' => 'like'],
        'gonggeren' => ['type' => 'string', 'filter' => 'like'],
        'gongunit' => ['type' => 'string', 'filter' => 'like'],
        'foodbt' => ['type' => 'string', 'filter' => 'like'],
        'hotbt' => ['type' => 'string', 'filter' => 'like'],
        'dnbt' => ['type' => 'string', 'filter' => 'like'],
        'jiansr' => ['type' => 'string', 'filter' => 'like'],
        'otherbt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrsalary}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'xuid', 'optid', 'status', 'isturn', 'ispay', 'cidao', 'zaotui', 'leave', 'jiaban', 'weidk'], 'integer'],
            [['optdt', 'applydt'], 'safe'],
            [['base', 'money', 'mones', 'postjt', 'skilljt', 'travelbt', 'telbt', 'reward', 'punish', 'socials', 'socialsunit', 'taxes', 'taxbase', 'otherzj', 'otherjs', 'cidaos', 'zaotuis', 'leaves', 'jiabans', 'weidks', 'jxjs', 'jxxs', 'jxdf', 'jtpost', 'ysbtime', 'zsbtime', 'gonggeren', 'gongunit', 'foodbt', 'hotbt', 'dnbt', 'jiansr', 'otherbt'], 'number'],
            [['uname', 'udeptname', 'ranking', 'optname'], 'string', 'max' => 20],
            [['explain'], 'string', 'max' => 500],
            [['month'], 'string', 'max' => 10],
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
            'xuid' => 'Xuid',
            'uname' => '对应人',
            'udeptname' => '对应人员部门',
            'ranking' => '职位',
            'optdt' => '操作时间',
            'optid' => 'Optid',
            'optname' => '操作人',
            'applydt' => '申请日期',
            'explain' => '说明',
            'status' => '状态',
            'isturn' => '是否提交',
            'month' => '月份',
            'base' => '基本工资',
            'money' => '实发',
            'mones' => '应发工资',
            'postjt' => '职务津贴',
            'skilljt' => '技能津贴',
            'travelbt' => '交通补贴',
            'telbt' => '通信补贴',
            'reward' => '奖励',
            'punish' => '处罚',
            'socials' => '个人社保',
            'socialsunit' => '单位社保缴费',
            'taxes' => '个人所得税',
            'taxbase' => '个税起征点',
            'ispay' => '是否发放',
            'otherzj' => '其它增加',
            'otherjs' => '其它减少',
            'cidao' => '迟到(次)',
            'cidaos' => '迟到处罚',
            'zaotui' => '早退(次)',
            'zaotuis' => '早退处罚',
            'leave' => '请假(小时)',
            'leaves' => '请假减少',
            'jiaban' => '加班(小时)',
            'jiabans' => '加班补贴',
            'weidk' => '未打卡(次)',
            'weidks' => '未打卡减少',
            'jxjs' => '绩效基数',
            'jxxs' => '绩效系数',
            'jxdf' => '绩效打分',
            'jtpost' => '绩效收入',
            'ysbtime' => '应上班天数',
            'zsbtime' => '已上班天数',
            'gonggeren' => '公积金个人',
            'gongunit' => '公积金单位',
            'foodbt' => '餐补贴',
            'hotbt' => '高温津贴',
            'dnbt' => '电脑补贴',
            'jiansr' => '计件收入',
            'otherbt' => '其他补贴',
        ];
    }
}
