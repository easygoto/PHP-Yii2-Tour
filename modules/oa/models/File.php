<?php

namespace app\modules\oa\models;

use app\web\Yii;

/**
 * This is the model class for table "{{%oa_file}}".
 *
 * @property int $id
 * @property string $filenum 文件编号
 * @property int $valid
 * @property string $filename
 * @property string $filetype
 * @property string $fileext
 * @property int $filesize
 * @property string $filesizecn
 * @property string $filepath
 * @property string $thumbpath
 * @property int $optid
 * @property string $optname 上传者
 * @property string $adddt
 * @property string $ip
 * @property string $web
 * @property string $mtype 对应类型
 * @property int $mid 管理id
 * @property int $downci 下载次数
 * @property string $keyoi 对应序号邮件附件中用到
 * @property string $pdfpath 转pdf后路径
 * @property int $oid 旧ID
 * @property string $mknum 模块编号
 */
class File extends \yii\db\ActiveRecord
{
    const FIELD_DETAIL = [
        'id' => ['type' => 'int', 'filter' => 'like'],
        'filenum' => ['type' => 'string', 'filter' => 'like'],
        'valid' => ['type' => 'int', 'filter' => 'like'],
        'filename' => ['type' => 'string', 'filter' => 'like'],
        'filetype' => ['type' => 'string', 'filter' => 'like'],
        'fileext' => ['type' => 'string', 'filter' => 'like'],
        'filesize' => ['type' => 'int', 'filter' => 'like'],
        'filesizecn' => ['type' => 'string', 'filter' => 'like'],
        'filepath' => ['type' => 'string', 'filter' => 'like'],
        'thumbpath' => ['type' => 'string', 'filter' => 'like'],
        'optid' => ['type' => 'int', 'filter' => 'like'],
        'optname' => ['type' => 'string', 'filter' => 'like'],
        'adddt' => ['type' => 'string', 'filter' => 'like'],
        'ip' => ['type' => 'string', 'filter' => 'like'],
        'web' => ['type' => 'string', 'filter' => 'like'],
        'mtype' => ['type' => 'string', 'filter' => 'like'],
        'mid' => ['type' => 'int', 'filter' => 'like'],
        'downci' => ['type' => 'int', 'filter' => 'like'],
        'keyoi' => ['type' => 'string', 'filter' => 'like'],
        'pdfpath' => ['type' => 'string', 'filter' => 'like'],
        'oid' => ['type' => 'int', 'filter' => 'like'],
        'mknum' => ['type' => 'string', 'filter' => 'like'],
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
        return '{{%oa_file}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valid', 'filesize', 'optid', 'mid', 'downci', 'oid'], 'integer'],
            [['adddt'], 'safe'],
            [['filenum', 'fileext', 'keyoi'], 'string', 'max' => 20],
            [['filename'], 'string', 'max' => 200],
            [['filetype', 'optname', 'mtype'], 'string', 'max' => 50],
            [['filesizecn', 'ip', 'mknum'], 'string', 'max' => 30],
            [['filepath', 'thumbpath', 'pdfpath'], 'string', 'max' => 100],
            [['web'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filenum' => '文件编号',
            'valid' => 'Valid',
            'filename' => 'Filename',
            'filetype' => 'Filetype',
            'fileext' => 'Fileext',
            'filesize' => 'Filesize',
            'filesizecn' => 'Filesizecn',
            'filepath' => 'Filepath',
            'thumbpath' => 'Thumbpath',
            'optid' => 'Optid',
            'optname' => '上传者',
            'adddt' => 'Adddt',
            'ip' => 'Ip',
            'web' => 'Web',
            'mtype' => '对应类型',
            'mid' => '管理id',
            'downci' => '下载次数',
            'keyoi' => '对应序号邮件附件中用到',
            'pdfpath' => '转pdf后路径',
            'oid' => '旧ID',
            'mknum' => '模块编号',
        ];
    }
}
