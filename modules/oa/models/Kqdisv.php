<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_kqdisv}}".
 *
 * @property int $id
 * @property int $plx 1组排班,2人员
 * @property int $receid 组id,人员Id
 * @property string $dt 日期
 * @property int $type 0考勤时间,1休息,2工作日
 * @property int $mid 对应主ID
 */
class Kqdisv extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'plx' => ['type' => 'int', 'filter' => 'like'],
        'receid' => ['type' => 'int', 'filter' => 'like'],
        'dt' => ['type' => 'string', 'filter' => 'like'],
        'type' => ['type' => 'int', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
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
        return '{{%oa_kqdisv}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plx', 'receid', 'type', 'mid'], 'integer'],
            [['dt'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plx' => '1组排班,2人员',
            'receid' => '组id,人员Id',
            'dt' => '日期',
            'type' => '0考勤时间,1休息,2工作日',
            'mid' => '对应主ID',
        ];
    }
}
