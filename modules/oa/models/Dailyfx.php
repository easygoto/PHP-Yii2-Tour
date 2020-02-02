<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_dailyfx}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $month 月份
 * @property string $optdt 分析时间
 * @property int $day1 0未写,1已写,2请假,3休息日
 * @property int $day2
 * @property int $day3
 * @property int $day4
 * @property int $day5
 * @property int $day6
 * @property int $day7
 * @property int $day8
 * @property int $day9
 * @property int $day10
 * @property int $day11
 * @property int $day12
 * @property int $day13
 * @property int $day14
 * @property int $day15
 * @property int $day16
 * @property int $day17
 * @property int $day18
 * @property int $day19
 * @property int $day20
 * @property int $day21
 * @property int $day22
 * @property int $day23
 * @property int $day24
 * @property int $day25
 * @property int $day26
 * @property int $day27
 * @property int $day28
 * @property int $day29
 * @property int $day30
 * @property int $day31
 * @property int $totaly 应写次数
 * @property int $totalx 已写次数
 * @property int $totalw 未写次数
 * @property string $explain 说明
 */
class Dailyfx extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'uid' => ['type' => 'int', 'filter' => 'like'],
        'month' => ['type' => 'string', 'filter' => 'like'],
        'optdt' => ['type' => 'string', 'filter' => 'like'],
        'day1' => ['type' => 'int', 'filter' => 'like'],
        'day2' => ['type' => 'int', 'filter' => 'like'],
        'day3' => ['type' => 'int', 'filter' => 'like'],
        'day4' => ['type' => 'int', 'filter' => 'like'],
        'day5' => ['type' => 'int', 'filter' => 'like'],
        'day6' => ['type' => 'int', 'filter' => 'like'],
        'day7' => ['type' => 'int', 'filter' => 'like'],
        'day8' => ['type' => 'int', 'filter' => 'like'],
        'day9' => ['type' => 'int', 'filter' => 'like'],
        'day10' => ['type' => 'int', 'filter' => 'like'],
        'day11' => ['type' => 'int', 'filter' => 'like'],
        'day12' => ['type' => 'int', 'filter' => 'like'],
        'day13' => ['type' => 'int', 'filter' => 'like'],
        'day14' => ['type' => 'int', 'filter' => 'like'],
        'day15' => ['type' => 'int', 'filter' => 'like'],
        'day16' => ['type' => 'int', 'filter' => 'like'],
        'day17' => ['type' => 'int', 'filter' => 'like'],
        'day18' => ['type' => 'int', 'filter' => 'like'],
        'day19' => ['type' => 'int', 'filter' => 'like'],
        'day20' => ['type' => 'int', 'filter' => 'like'],
        'day21' => ['type' => 'int', 'filter' => 'like'],
        'day22' => ['type' => 'int', 'filter' => 'like'],
        'day23' => ['type' => 'int', 'filter' => 'like'],
        'day24' => ['type' => 'int', 'filter' => 'like'],
        'day25' => ['type' => 'int', 'filter' => 'like'],
        'day26' => ['type' => 'int', 'filter' => 'like'],
        'day27' => ['type' => 'int', 'filter' => 'like'],
        'day28' => ['type' => 'int', 'filter' => 'like'],
        'day29' => ['type' => 'int', 'filter' => 'like'],
        'day30' => ['type' => 'int', 'filter' => 'like'],
        'day31' => ['type' => 'int', 'filter' => 'like'],
        'totaly' => ['type' => 'int', 'filter' => 'like'],
        'totalx' => ['type' => 'int', 'filter' => 'like'],
        'totalw' => ['type' => 'int', 'filter' => 'like'],
        'explain' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_dailyfx}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'day1', 'day2', 'day3', 'day4', 'day5', 'day6', 'day7', 'day8', 'day9', 'day10', 'day11', 'day12', 'day13', 'day14', 'day15', 'day16', 'day17', 'day18', 'day19', 'day20', 'day21', 'day22', 'day23', 'day24', 'day25', 'day26', 'day27', 'day28', 'day29', 'day30', 'day31', 'totaly', 'totalx', 'totalw'], 'integer'],
            [['optdt'], 'safe'],
            [['month'], 'string', 'max' => 10],
            [['explain'], 'string', 'max' => 200],
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
            'month' => '月份',
            'optdt' => '分析时间',
            'day1' => '0未写,1已写,2请假,3休息日',
            'day2' => 'Day2',
            'day3' => 'Day3',
            'day4' => 'Day4',
            'day5' => 'Day5',
            'day6' => 'Day6',
            'day7' => 'Day7',
            'day8' => 'Day8',
            'day9' => 'Day9',
            'day10' => 'Day10',
            'day11' => 'Day11',
            'day12' => 'Day12',
            'day13' => 'Day13',
            'day14' => 'Day14',
            'day15' => 'Day15',
            'day16' => 'Day16',
            'day17' => 'Day17',
            'day18' => 'Day18',
            'day19' => 'Day19',
            'day20' => 'Day20',
            'day21' => 'Day21',
            'day22' => 'Day22',
            'day23' => 'Day23',
            'day24' => 'Day24',
            'day25' => 'Day25',
            'day26' => 'Day26',
            'day27' => 'Day27',
            'day28' => 'Day28',
            'day29' => 'Day29',
            'day30' => 'Day30',
            'day31' => 'Day31',
            'totaly' => '应写次数',
            'totalx' => '已写次数',
            'totalw' => '未写次数',
            'explain' => '说明',
        ];
    }
}
