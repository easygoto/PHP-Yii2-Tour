<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_admin}}".
 *
 * @property int $id
 * @property string $num 编号
 * @property string $user 用户名
 * @property string $name 姓名
 * @property string $pass 密码
 * @property int $loginci 登录次数
 * @property int $status 是否启用
 * @property int $type 0普通1管理员
 * @property string $sex 性别
 * @property string $tel 电话
 * @property string $face 头像地址
 * @property int $deptid 主部门ID
 * @property string $deptname 部门
 * @property string $deptids 其他部门ID
 * @property string $deptnames 多部门
 * @property string $rankings 多职位
 * @property string $deptallname 部门全部路径
 * @property string $superid
 * @property string $superman 上级主管
 * @property string $ranking 岗位
 * @property int $sort 排序号
 * @property string $deptpath 部门路径
 * @property string $superpath 上级主管路径
 * @property string $groupname
 * @property string $mobile
 * @property int $apptx 是否app提醒
 * @property string $workdate 入职时间
 * @property string $email 邮箱
 * @property string $lastpush 最后app推送时间
 * @property string $adddt 新增时间
 * @property string $weixinid 微信号
 * @property string $quitdt 离职日期
 * @property int $style 默认样式
 * @property string $pingyin 名字拼音
 * @property string $emailpass 邮箱密码
 * @property int $companyid 所在公司单位Id
 * @property int $online 在线状态
 * @property string $lastonline 最后在线时间
 * @property int $isvcard 是否在通讯录上显示
 * @property string $randslat 随机字符串
 */
class Admin extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'user' => ['type' => 'string', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'pass' => ['type' => 'string', 'filter' => 'like'],
        'loginci' => ['type' => 'int', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'sex' => ['type' => 'string', 'filter' => 'like'],
        'tel' => ['type' => 'string', 'filter' => 'like'],
        'face' => ['type' => 'string', 'filter' => 'like'],
        'deptid' => ['type' => 'int', 'filter' => 'like'],
        'deptname' => ['type' => 'string', 'filter' => 'like'],
        'deptids' => ['type' => 'string', 'filter' => 'like'],
        'deptnames' => ['type' => 'string', 'filter' => 'like'],
        'rankings' => ['type' => 'string', 'filter' => 'like'],
        'deptallname' => ['type' => 'string', 'filter' => 'like'],
        'superid' => ['type' => 'string', 'filter' => 'like'],
        'superman' => ['type' => 'string', 'filter' => 'like'],
        'ranking' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'deptpath' => ['type' => 'string', 'filter' => 'like'],
        'superpath' => ['type' => 'string', 'filter' => 'like'],
        'groupname' => ['type' => 'string', 'filter' => 'like'],
        'mobile' => ['type' => 'string', 'filter' => 'like'],
        'apptx' => ['type' => 'int', 'filter' => 'like'],
        'workdate' => ['type' => 'string', 'filter' => 'like'],
        'email' => ['type' => 'string', 'filter' => 'like'],
        'lastpush' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'weixinid' => ['type' => 'string', 'filter' => 'like'],
        'quitdt' => ['type' => 'string', 'filter' => 'like'],
        'style' => ['type' => 'int', 'filter' => 'like'],
        'pingyin' => ['type' => 'string', 'filter' => 'like'],
        'emailpass' => ['type' => 'string', 'filter' => 'like'],
        'companyid' => ['type' => 'int', 'filter' => 'like'],
        'online' => ['type' => 'int', 'filter' => 'like'],
        'lastonline' => ['type' => 'string', 'filter' => 'like'],
        'isvcard' => ['type' => 'int', 'filter' => 'like'],
        'randslat' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_admin}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user'], 'required'],
            [['loginci', 'status', 'type', 'deptid', 'sort', 'apptx', 'style', 'companyid', 'online', 'isvcard'], 'integer'],
            [['workdate', 'lastpush', 'adddt', 'quitdt', 'lastonline'], 'safe'],
            [['num', 'superman'], 'string', 'max' => 20],
            [['user', 'name', 'tel', 'deptname', 'superid', 'email', 'weixinid', 'pingyin', 'randslat'], 'string', 'max' => 50],
            [['pass', 'deptnames', 'rankings', 'deptpath', 'superpath', 'groupname', 'mobile', 'emailpass'], 'string', 'max' => 100],
            [['sex'], 'string', 'max' => 10],
            [['face'], 'string', 'max' => 300],
            [['deptids'], 'string', 'max' => 30],
            [['deptallname'], 'string', 'max' => 200],
            [['ranking'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => '编号',
            'user' => '用户名',
            'name' => '姓名',
            'pass' => '密码',
            'loginci' => '登录次数',
            'status' => '是否启用',
            'type' => '0普通1管理员',
            'sex' => '性别',
            'tel' => '电话',
            'face' => '头像地址',
            'deptid' => '主部门ID',
            'deptname' => '部门',
            'deptids' => '其他部门ID',
            'deptnames' => '多部门',
            'rankings' => '多职位',
            'deptallname' => '部门全部路径',
            'superid' => 'Superid',
            'superman' => '上级主管',
            'ranking' => '岗位',
            'sort' => '排序号',
            'deptpath' => '部门路径',
            'superpath' => '上级主管路径',
            'groupname' => 'Groupname',
            'mobile' => 'Mobile',
            'apptx' => '是否app提醒',
            'workdate' => '入职时间',
            'email' => '邮箱',
            'lastpush' => '最后app推送时间',
            'adddt' => '新增时间',
            'weixinid' => '微信号',
            'quitdt' => '离职日期',
            'style' => '默认样式',
            'pingyin' => '名字拼音',
            'emailpass' => '邮箱密码',
            'companyid' => '所在公司单位Id',
            'online' => '在线状态',
            'lastonline' => '最后在线时间',
            'isvcard' => '是否在通讯录上显示',
            'randslat' => '随机字符串',
        ];
    }
}
