<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqdist}}".
 *
 * @property int $id
 * @property string $recename 适用对象
 * @property string $receid
 * @property int $mid
 * @property int $type 0考勤时间,1休息,2定位的
 * @property string $startdt
 * @property string $enddt
 * @property int $status 状态
 * @property int $sort 排序号
 */
class Kqdist extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'recename' => ['type' => 'string', 'filter' => 'like'],
        'receid' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'startdt' => ['type' => 'string', 'filter' => 'like'],
        'enddt' => ['type' => 'string', 'filter' => 'like'],
        'status' => ['type' => 'int', 'filter' => 'like'],
        'sort' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_kqdist}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mid', 'type', 'status', 'sort'], 'integer'],
            [['startdt', 'enddt'], 'safe'],
            [['recename', 'receid'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recename' => '适用对象',
            'receid' => 'Receid',
            'mid' => 'Mid',
            'type' => '0考勤时间,1休息,2定位的',
            'startdt' => 'Startdt',
            'enddt' => 'Enddt',
            'status' => '状态',
            'sort' => '排序号',
        ];
    }
}
