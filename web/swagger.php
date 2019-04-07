<?php

$openapiPath = __DIR__ . '/openapi.yaml';
if (file_exists($openapiPath)) {
    unlink($openapiPath);
}
$controllersDir = "D:\Dev\Projects\www\study-yii\controllers";
$openapiDir     = "D:\Dev\Projects\www\swagger-php\bin\openapi";
$targetApiDir   = realpath(__DIR__);
$message        = exec("php71 \"{$openapiDir}\" \"{$controllersDir}\" -o \"{$targetApiDir}\"");
if (! empty($message)) {
    $happenTime = str_repeat("-", 10) . date('Y-m-d H:i:s') . str_repeat("-", 10);
    file_put_contents('logs/' . date('Y_m_d') . '.log', "{$happenTime}\n{$message}\n\n", FILE_APPEND);
}

header("Location: /swagger.html");
