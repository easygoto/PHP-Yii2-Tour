<?php

namespace app\modules\gen;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Gen.
 */
class GenAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/gen/assets';
    public $css = [
        'css/main.css',
        'css/style.css',
    ];
    public $js = [
        'js/bs4-native.min.js',
        'js/gen.js',
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
