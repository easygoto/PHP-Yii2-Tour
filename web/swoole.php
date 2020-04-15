<?php

use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$host = '0.0.0.0';
$port = 9505;
$server = new Server($host, $port);
$server->set(
    [
        'reactor_num' => 1,
        'worker_num' => 1,
        'task_worker_num' => 1,
        'max_request' => 1,
    ]
);

function handleStart(Server $server)
{
}

function handleShutdown(Server $server)
{
}

function handleRequest(Request $request, Response $response)
{
    $requestUri = $request->server['request_uri'] ?? '';
    if ($request->server['path_info'] == '/favicon.ico' || $requestUri == '/favicon.ico') {
        return $response->end();
    }
    handleRequest2Super($request);
    require __DIR__ . '/common.php';
    $config = require dirname(__DIR__) . '/config/web.php';
    return $response->end((new app\web\Application($config))->run());
}

function handleTask(Server $server, int $taskId, int $srcWorkerId, $data)
{
}

function handleRequest2Super(Request $request)
{
    $_SERVER = $_COOKIE = $_GET = $_POST = $_FILES = [];
    $_SERVER['SCRIPT_NAME'] = '/index.php';
    $_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/index.php';

    if ($request->server) {
        foreach ($request->server as $key => $item) {
            $_SERVER[strtoupper($key)] = $item;
        }
    }
    if ($request->header) {
        foreach ($request->header as $key => $item) {
            $_SERVER['HTTP_' . strtoupper(str_replace('-', '_', $key))] = $item;
        }
    }
    if ($request->cookie) {
        foreach ($request->cookie as $key => $item) {
            $_COOKIE[$key] = $item;
        }
    }
    if ($request->get) {
        foreach ($request->get as $key => $item) {
            $_GET[$key] = $item;
        }
    }
    if ($request->post) {
        foreach ($request->post as $key => $item) {
            $_POST[$key] = $item;
        }
    }
    if ($request->files) {
        foreach ($request->files as $key => $item) {
            $_FILES[$key] = $item;
        }
    }
    $_REQUEST = array_merge($_GET, $_POST);
}

$server->on('start', 'handleStart');
$server->on('shutdown', 'handleShutdown');
$server->on('request', 'handleRequest');
$server->on('task', 'handleTask');

$server->start();
