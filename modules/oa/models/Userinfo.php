<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_userinfo}}".
 *
 * @property int $id
 * @property string $name 姓名
 * @property string $num 编号
 * @property string $deptname
 * @property string $deptnames 多部门
 * @property string $deptallname
 * @property string $ranking
 * @property string $rankings 多职位
 * @property string $dkip
 * @property string $dkmac
 * @property int $state 状态来自userstate
 * @property string $sex 性别
 * @property string $tel 电话
 * @property string $mobile 手机号
 * @property string $workdate 入职时间
 * @property string $email 邮箱
 * @property string $quitdt 离职日期
 * @property int $iskq 是否考勤
 * @property int $isdwdk 是否定位打卡
 * @property string $birthday 生日
 * @property string $xueli
 * @property int $birtype 0阳历1农历
 * @property string $minzu 民族
 * @property string $hunyin 婚姻
 * @property string $jiguan 籍贯
 * @property string $nowdizhi 现住址
 * @property string $housedizhi 家庭地址
 * @property string $syenddt 试用期到
 * @property string $positivedt 转正日期
 * @property string $bankname 开户行
 * @property string $banknum 工资卡帐号
 * @property string $zhaopian 照片
 * @property string $idnum 身份证号
 * @property string $spareman 备用联系人
 * @property string $sparetel 备用联系人电话
 * @property int $isdaily 是否需要写日报
 * @property int $companyid 所在公司单位Id
 * @property string $finger 关联考勤机人员编号
 */
class Userinfo extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'deptname' => ['type' => 'string', 'filter' => 'like'],
        'deptnames' => ['type' => 'string', 'filter' => 'like'],
        'deptallname' => ['type' => 'string', 'filter' => 'like'],
        'ranking' => ['type' => 'string', 'filter' => 'like'],
        'rankings' => ['type' => 'string', 'filter' => 'like'],
        'dkip' => ['type' => 'string', 'filter' => 'like'],
        'dkmac' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'sex' => ['type' => 'string', 'filter' => 'like'],
        'tel' => ['type' => 'string', 'filter' => 'like'],
        'mobile' => ['type' => 'string', 'filter' => 'like'],
        'workdate' => ['type' => 'string', 'filter' => 'like'],
        'email' => ['type' => 'string', 'filter' => 'like'],
        'quitdt' => ['type' => 'string', 'filter' => 'like'],
        'iskq' => ['type' => 'int', 'filter' => 'like'],
        'isdwdk' => ['type' => 'int', 'filter' => 'like'],
        'birthday' => ['type' => 'string', 'filter' => 'like'],
        'xueli' => ['type' => 'string', 'filter' => 'like'],
        'birtype' => ['type' => 'int', 'filter' => 'like'],
        'minzu' => ['type' => 'string', 'filter' => 'like'],
        'hunyin' => ['type' => 'string', 'filter' => 'like'],
        'jiguan' => ['type' => 'string', 'filter' => 'like'],
        'nowdizhi' => ['type' => 'string', 'filter' => 'like'],
        'housedizhi' => ['type' => 'string', 'filter' => 'like'],
        'syenddt' => ['type' => 'string', 'filter' => 'like'],
        'positivedt' => ['type' => 'string', 'filter' => 'like'],
        'bankname' => ['type' => 'string', 'filter' => 'like'],
        'banknum' => ['type' => 'string', 'filter' => 'like'],
        'zhaopian' => ['type' => 'string', 'filter' => 'like'],
        'idnum' => ['type' => 'string', 'filter' => 'like'],
        'spareman' => ['type' => 'string', 'filter' => 'like'],
        'sparetel' => ['type' => 'string', 'filter' => 'like'],
        'isdaily' => ['type' => 'int', 'filter' => 'like'],
        'companyid' => ['type' => 'int', 'filter' => 'like'],
        'finger' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_userinfo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'state', 'iskq', 'isdwdk', 'birtype', 'isdaily', 'companyid'], 'integer'],
            [['workdate', 'quitdt', 'birthday', 'syenddt', 'positivedt'], 'safe'],
            [['name', 'num', 'ranking', 'xueli', 'minzu', 'jiguan', 'finger'], 'string', 'max' => 20],
            [['deptname', 'banknum', 'idnum', 'spareman'], 'string', 'max' => 30],
            [['deptnames', 'rankings', 'mobile', 'zhaopian'], 'string', 'max' => 100],
            [['deptallname', 'dkip', 'dkmac'], 'string', 'max' => 200],
            [['sex', 'hunyin'], 'string', 'max' => 10],
            [['tel', 'email', 'nowdizhi', 'housedizhi', 'bankname', 'sparetel'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'num' => '编号',
            'deptname' => 'Deptname',
            'deptnames' => '多部门',
            'deptallname' => 'Deptallname',
            'ranking' => 'Ranking',
            'rankings' => '多职位',
            'dkip' => 'Dkip',
            'dkmac' => 'Dkmac',
            'state' => '状态来自userstate',
            'sex' => '性别',
            'tel' => '电话',
            'mobile' => '手机号',
            'workdate' => '入职时间',
            'email' => '邮箱',
            'quitdt' => '离职日期',
            'iskq' => '是否考勤',
            'isdwdk' => '是否定位打卡',
            'birthday' => '生日',
            'xueli' => 'Xueli',
            'birtype' => '0阳历1农历',
            'minzu' => '民族',
            'hunyin' => '婚姻',
            'jiguan' => '籍贯',
            'nowdizhi' => '现住址',
            'housedizhi' => '家庭地址',
            'syenddt' => '试用期到',
            'positivedt' => '转正日期',
            'bankname' => '开户行',
            'banknum' => '工资卡帐号',
            'zhaopian' => '照片',
            'idnum' => '身份证号',
            'spareman' => '备用联系人',
            'sparetel' => '备用联系人电话',
            'isdaily' => '是否需要写日报',
            'companyid' => '所在公司单位Id',
            'finger' => '关联考勤机人员编号',
        ];
    }
}
