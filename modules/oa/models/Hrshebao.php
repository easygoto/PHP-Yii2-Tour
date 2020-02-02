<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_hrshebao}}".
 *
 * @property int $id
 * @property string $title 名称
 * @property string $recename 适用对象
 * @property string $receid
 * @property int $status 是否开启
 * @property string $gongjishu 公积金基数
 * @property string $yljishu 养老保险基数
 * @property string $ylgeren 养老个人比例(%)
 * @property string $ylunit 养老单位比例(%)
 * @property string $syjishu 失业报销基数
 * @property string $sygeren 失业个人比例(%)
 * @property string $syunit 失业单位比例(%)
 * @property string $gsjishu 工伤报销基数
 * @property string $gsgeren 工伤个人比例(%)
 * @property string $gsunit 工伤单位比例(%)
 * @property string $syujishu 生育保险基数
 * @property string $syugeren 生育个人比例(%)
 * @property string $syuunit 生育单位比例(%)
 * @property string $yijishu 医疗报销基数
 * @property string $yigeren 医疗个人比例(%)
 * @property string $yiunit 医疗单位比例(%)
 * @property string $dbgeren 大病个人
 * @property string $gjjgeren 公积金个人比例(%)
 * @property string $gjjunit 公积金单位比例(%)
 * @property string $shebaogeren 个人社保缴费
 * @property string $shebaounit 单位社保缴费
 * @property string $sctime 每月生成时间
 * @property string $optdt
 * @property string $gonggeren 公积金个人
 * @property string $gongunit 公积金单位
 * @property string $explian 说明
 * @property string $startdt 开始月份
 * @property string $enddt 截止月份
 */
class Hrshebao extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'title' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'gongjishu' => ['type' => 'string', 'filter' => 'like'],
        'yljishu' => ['type' => 'string', 'filter' => 'like'],
        'ylgeren' => ['type' => 'string', 'filter' => 'like'],
        'ylunit' => ['type' => 'string', 'filter' => 'like'],
        'syjishu' => ['type' => 'string', 'filter' => 'like'],
        'sygeren' => ['type' => 'string', 'filter' => 'like'],
        'syunit' => ['type' => 'string', 'filter' => 'like'],
        'gsjishu' => ['type' => 'string', 'filter' => 'like'],
        'gsgeren' => ['type' => 'string', 'filter' => 'like'],
        'gsunit' => ['type' => 'string', 'filter' => 'like'],
        'syujishu' => ['type' => 'string', 'filter' => 'like'],
        'syugeren' => ['type' => 'string', 'filter' => 'like'],
        'syuunit' => ['type' => 'string', 'filter' => 'like'],
        'yijishu' => ['type' => 'string', 'filter' => 'like'],
        'yigeren' => ['type' => 'string', 'filter' => 'like'],
        'yiunit' => ['type' => 'string', 'filter' => 'like'],
        'dbgeren' => ['type' => 'string', 'filter' => 'like'],
        'gjjgeren' => ['type' => 'string', 'filter' => 'like'],
        'gjjunit' => ['type' => 'string', 'filter' => 'like'],
        'shebaogeren' => ['type' => 'string', 'filter' => 'like'],
        'shebaounit' => ['type' => 'string', 'filter' => 'like'],
        'sctime' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'gonggeren' => ['type' => 'string', 'filter' => 'like'],
        'gongunit' => ['type' => 'string', 'filter' => 'like'],
        'explian' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_hrshebao}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['gongjishu', 'yljishu', 'ylgeren', 'ylunit', 'syjishu', 'sygeren', 'syunit', 'gsjishu', 'gsgeren', 'gsunit', 'syujishu', 'syugeren', 'syuunit', 'yijishu', 'yigeren', 'yiunit', 'dbgeren', 'gjjgeren', 'gjjunit', 'shebaogeren', 'shebaounit', 'gonggeren', 'gongunit'], 'number'],
            [['optdt'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['recename', 'receid', 'explian'], 'string', 'max' => 500],
            [['sctime', 'startdt', 'enddt'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '名称',
            'recename' => '适用对象',
            'receid' => 'Receid',
            'status' => '是否开启',
            'gongjishu' => '公积金基数',
            'yljishu' => '养老保险基数',
            'ylgeren' => '养老个人比例(%)',
            'ylunit' => '养老单位比例(%)',
            'syjishu' => '失业报销基数',
            'sygeren' => '失业个人比例(%)',
            'syunit' => '失业单位比例(%)',
            'gsjishu' => '工伤报销基数',
            'gsgeren' => '工伤个人比例(%)',
            'gsunit' => '工伤单位比例(%)',
            'syujishu' => '生育保险基数',
            'syugeren' => '生育个人比例(%)',
            'syuunit' => '生育单位比例(%)',
            'yijishu' => '医疗报销基数',
            'yigeren' => '医疗个人比例(%)',
            'yiunit' => '医疗单位比例(%)',
            'dbgeren' => '大病个人',
            'gjjgeren' => '公积金个人比例(%)',
            'gjjunit' => '公积金单位比例(%)',
            'shebaogeren' => '个人社保缴费',
            'shebaounit' => '单位社保缴费',
            'sctime' => '每月生成时间',
            'optdt' => 'Optdt',
            'gonggeren' => '公积金个人',
            'gongunit' => '公积金单位',
            'explian' => '说明',
            'startdt' => '开始月份',
            'enddt' => '截止月份',
        ];
    }
}
