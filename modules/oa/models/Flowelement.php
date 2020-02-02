<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_flow_element}}".
 *
 * @property int $id
 * @property int $mid
 * @property string $name
 * @property string $fields 对应字段
 * @property string $fieldstype
 * @property int $sort
 * @property string $dev 默认值
 * @property int $isbt 是否必填
 * @property string $data 数据源
 * @property int $islu 是否录入元素
 * @property int $iszs 是否列表展示
 * @property string $attr 属性
 * @property int $iszb
 * @property int $isss
 * @property string $lattr 列属性
 * @property string $width 列宽
 * @property int $lens 字段长度
 * @property string $savewhere 保存条件
 * @property int $islb 是否列表列
 * @property int $ispx 是否可排序
 * @property int $isalign 0居中,1居左,2居右
 * @property int $issou 是否可搜索
 * @property int $istj 是否可统计
 * @property string $gongsi 计算公式
 * @property string $placeholder 提示内容
 * @property int $isonly 是否唯一
 * @property int $isdr 是否导入字段
 */
class Flowelement extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'fields' => ['type' => 'string', 'filter' => 'like'],
        'fieldstype' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'dev' => ['type' => 'string', 'filter' => 'like'],
        'isbt' => ['type' => 'int', 'filter' => 'like'],
        'data' => ['type' => 'string', 'filter' => 'like'],
        'islu' => ['type' => 'int', 'filter' => 'like'],
        'iszs' => ['type' => 'int', 'filter' => 'like'],
        'attr' => ['type' => 'string', 'filter' => 'like'],
        'iszb' => ['type' => 'int', 'filter' => 'like'],
        'isss' => ['type' => 'int', 'filter' => 'like'],
        'lattr' => ['type' => 'string', 'filter' => 'like'],
        'width' => ['type' => 'string', 'filter' => 'like'],
        'lens' => ['type' => 'int', 'filter' => 'like'],
        'savewhere' => ['type' => 'string', 'filter' => 'like'],
        'islb' => ['type' => 'int', 'filter' => 'like'],
        'ispx' => ['type' => 'int', 'filter' => 'like'],
        'isalign' => ['type' => 'int', 'filter' => 'like'],
        'issou' => ['type' => 'int', 'filter' => 'like'],
        'istj' => ['type' => 'int', 'filter' => 'like'],
        'gongsi' => ['type' => 'string', 'filter' => 'like'],
        'placeholder' => ['type' => 'string', 'filter' => 'like'],
        'isonly' => ['type' => 'int', 'filter' => 'like'],
        'isdr' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_flow_element}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'sort', 'isbt', 'islu', 'iszs', 'iszb', 'isss', 'lens', 'islb', 'ispx', 'isalign', 'issou', 'istj', 'isonly', 'isdr'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['fields', 'placeholder'], 'string', 'max' => 50],
            [['fieldstype'], 'string', 'max' => 30],
            [['dev', 'lattr', 'savewhere'], 'string', 'max' => 100],
            [['data', 'attr', 'gongsi'], 'string', 'max' => 500],
            [['width'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mid' => 'Mid',
            'name' => 'Name',
            'fields' => '对应字段',
            'fieldstype' => 'Fieldstype',
            'sort' => 'Sort',
            'dev' => '默认值',
            'isbt' => '是否必填',
            'data' => '数据源',
            'islu' => '是否录入元素',
            'iszs' => '是否列表展示',
            'attr' => '属性',
            'iszb' => 'Iszb',
            'isss' => 'Isss',
            'lattr' => '列属性',
            'width' => '列宽',
            'lens' => '字段长度',
            'savewhere' => '保存条件',
            'islb' => '是否列表列',
            'ispx' => '是否可排序',
            'isalign' => '0居中,1居左,2居右',
            'issou' => '是否可搜索',
            'istj' => '是否可统计',
            'gongsi' => '计算公式',
            'placeholder' => '提示内容',
            'isonly' => '是否唯一',
            'isdr' => '是否导入字段',
        ];
    }
}
