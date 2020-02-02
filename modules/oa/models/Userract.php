<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_userract}}".
 *
 * @property int $id
 * @property string $name
 * @property string $startdt 开始日期
 * @property string $enddt 截止日期
 * @property int $uid
 * @property int $sort
 * @property string $optdt
 * @property string $explain
 * @property string $httype 合同类型
 * @property int $state 0|待执行,1|生效中,2|已终止,3|已过期
 * @property string $tqenddt 提前终止
 * @property string $company 签署公司
 * @property string $uname 签署人
 * @property int $companyid 签署公司Id
 */
class Userract extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'httype' => ['type' => 'string', 'filter' => 'like'],
        'state' => ['type' => 'int', 'filter' => 'like'],
        'tqenddt' => ['type' => 'string', 'filter' => 'like'],
        'company' => ['type' => 'string', 'filter' => 'like'],
        'uname' => ['type' => 'string', 'filter' => 'like'],
        'companyid' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_userract}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['startdt', 'enddt', 'optdt', 'tqenddt'], 'safe'],
            [['uid', 'sort', 'state', 'companyid'], 'integer'],
            [['name', 'company'], 'string', 'max' => 50],
            [['explain'], 'string', 'max' => 500],
            [['httype'], 'string', 'max' => 30],
            [['uname'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'startdt' => '开始日期',
            'enddt' => '截止日期',
            'uid' => 'Uid',
            'sort' => 'Sort',
            'optdt' => 'Optdt',
            'explain' => 'Explain',
            'httype' => '合同类型',
            'state' => '0|待执行,1|生效中,2|已终止,3|已过期',
            'tqenddt' => '提前终止',
            'company' => '签署公司',
            'uname' => '签署人',
            'companyid' => '签署公司Id',
        ];
    }
}
