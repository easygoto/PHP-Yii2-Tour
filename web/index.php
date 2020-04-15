<?php

require __DIR__ . '/common.php';

$config = require dirname(__DIR__) . '/config/web.php';
(new app\web\Application($config))->run();
