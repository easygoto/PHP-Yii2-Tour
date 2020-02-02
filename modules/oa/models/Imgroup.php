<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_im_group}}".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $pid 对应上级
 * @property string $types 应用分类
 * @property int $type 类型@0|群,1|讨论组,2|应用
 * @property int $sort 排序号
 * @property int $createid
 * @property string $createname 创建人
 * @property string $createdt 创建时间
 * @property string $face 头像
 * @property string $num
 * @property string $receid
 * @property string $recename
 * @property string $url
 * @property int $valid
 * @property string $explain
 * @property string $iconfont 对应字体图标
 * @property string $iconcolor 字体图标颜色
 * @property int $yylx 应用类型0全部,1pc,2手机
 * @property string $urlpc 应用上PC地址
 * @property string $urlm 应用上手机端地址
 * @property string $deptid 对应部门id
 */
class Imgroup extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'pid' => ['type' => 'int', 'filter' => 'like'],
        'types' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'createid' => ['type' => 'int', 'filter' => 'like'],
        'createname' => ['type' => 'string', 'filter' => 'like'],
        'createdt' => ['type' => 'string', 'filter' => 'like'],
        'face' => ['type' => 'string', 'filter' => 'like'],
        'num' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'url' => ['type' => 'string', 'filter' => 'like'],
        'valid' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
        'iconfont' => ['type' => 'string', 'filter' => 'like'],
        'iconcolor' => ['type' => 'string', 'filter' => 'like'],
        'yylx' => ['type' => 'int', 'filter' => 'like'],
        'urlpc' => ['type' => 'string', 'filter' => 'like'],
        'urlm' => ['type' => 'string', 'filter' => 'like'],
        'deptid' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_im_group}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'type', 'sort', 'createid', 'valid', 'yylx'], 'integer'],
            [['createdt'], 'safe'],
            [['name', 'createname', 'num'], 'string', 'max' => 20],
            [['types'], 'string', 'max' => 10],
            [['face'], 'string', 'max' => 50],
            [['receid', 'recename', 'explain', 'urlpc', 'urlm'], 'string', 'max' => 200],
            [['url', 'deptid'], 'string', 'max' => 100],
            [['iconfont'], 'string', 'max' => 30],
            [['iconcolor'], 'string', 'max' => 7],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'pid' => '对应上级',
            'types' => '应用分类',
            'type' => '类型@0|群,1|讨论组,2|应用',
            'sort' => '排序号',
            'createid' => 'Createid',
            'createname' => '创建人',
            'createdt' => '创建时间',
            'face' => '头像',
            'num' => 'Num',
            'receid' => 'Receid',
            'recename' => 'Recename',
            'url' => 'Url',
            'valid' => 'Valid',
            'explain' => 'Explain',
            'iconfont' => '对应字体图标',
            'iconcolor' => '字体图标颜色',
            'yylx' => '应用类型0全部,1pc,2手机',
            'urlpc' => '应用上PC地址',
            'urlm' => '应用上手机端地址',
            'deptid' => '对应部门id',
        ];
    }
}
