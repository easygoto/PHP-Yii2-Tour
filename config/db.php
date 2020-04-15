<?php

$db = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=stu_yii2basic',
    'username' => 'root',
    'password' => '123123',
    'charset' => 'utf8',
    'tablePrefix' => '',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

if (YII_ENV === 'test') {
    $db['dsn'] = 'mysql:host=localhost;dbname=yii2_basic_tests';
}

return $db;
