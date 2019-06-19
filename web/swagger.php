<?php

$openApiPath = __DIR__ . '/openapi.yaml';
if (file_exists($openApiPath)) {
    unlink($openApiPath);
}
$controllersDir = dirname(__DIR__) . "/controllers";
$openApiDir     = dirname(dirname(__DIR__)) . "/swagger-php/bin/openapi";
$targetApiDir   = realpath(__DIR__);
$message        = exec("php7 \"{$openApiDir}\" \"{$controllersDir}\" -o \"{$targetApiDir}\"");
if ($message) {
    exit($message);
}

header("Location: /swagger.html");
