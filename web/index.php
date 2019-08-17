<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_ENV_DEV') or define('YII_ENV_DEV', true);
defined('YII_ENABLE_ERROR_HANDLER') or define('YII_ENABLE_ERROR_HANDLER', true);

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/core/Yii.php';
require dirname(__DIR__) . '/core/Application.php';
require dirname(__DIR__) . '/core/RouteRule.php';

$config = require dirname(__DIR__) . '/config/web.php';

(new app\web\Application($config))->run();
