<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_ENV_DEV') or define('YII_ENV_DEV', true);
defined('RESTFUL_API_ENABLE') or define('RESTFUL_API_ENABLE', false);
defined('YII_ENABLE_ERROR_HANDLER') or define('YII_ENABLE_ERROR_HANDLER', true);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../Yii.php';
require __DIR__ . '/../Application.php';

$config = require __DIR__ . '/../config/web.php';

(new app\web\Application($config))->run();
