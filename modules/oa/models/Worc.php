<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_worc}}".
 *
 * @property int $id
 * @property string $name 文档分区名称
 * @property string $recename 可查看人员
 * @property string $receid
 * @property int $sort 排序号
 * @property string $guanname 管理人员
 * @property string $guanid
 * @property string $optdt 操作时间
 * @property int $uid 所属用户
 * @property string $optname 创建人
 * @property string $uptype 限制上传类型
 */
class Worc extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'name' => ['type' => 'string', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
        'guanname' => ['type' => 'string', 'filter' => 'like'],
        'guanid' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'uptype' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_worc}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'uid'], 'integer'],
            [['optdt'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['recename', 'receid', 'guanname', 'guanid'], 'string', 'max' => 500],
            [['optname'], 'string', 'max' => 30],
            [['uptype'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '文档分区名称',
            'recename' => '可查看人员',
            'receid' => 'Receid',
            'sort' => '排序号',
            'guanname' => '管理人员',
            'guanid' => 'Guanid',
            'optdt' => '操作时间',
            'uid' => '所属用户',
            'optname' => '创建人',
            'uptype' => '限制上传类型',
        ];
    }
}
