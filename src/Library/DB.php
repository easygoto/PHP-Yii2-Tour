<?php


namespace Trink\Core\Library;

use Illuminate\Database\Capsule\Manager as CapsuleManager;
use Illuminate\Database\Connection as IlluminateConnection;
use Medoo\Medoo;
use Trink\Core\Container\App;
use Upfor\Juggler\Juggler;

class DB
{
    private static $instance;
    private static $capsule;
    private static $medoo;
    private static $juggler;

    private function __clone()
    {
    }

    public static function instance(): Medoo
    {
        if (!self::$instance instanceof self) {
            $db = App::instance()->config->get('db');

            self::$instance = new Medoo([
                'database_type' => $db['type'],
                'database_name' => $db['name'],
                'server'        => $db['host'],
                'username'      => $db['user'],
                'password'      => $db['pass'],
            ]);
        }
        return self::$instance;
    }

    public static function capsule(): IlluminateConnection
    {
        if (!self::$capsule instanceof CapsuleManager) {
            $db = App::instance()->config->get('db');

            self::$capsule = new CapsuleManager;
            self::$capsule->addConnection([
                'driver'    => $db['type'],
                'host'      => $db['host'],
                'database'  => $db['name'],
                'username'  => $db['user'],
                'password'  => $db['pass'],
                'charset'   => $db['charset'],
                'collation' => $db['collation'],
                'prefix'    => $db['prefix'],
            ]);
        }
        return self::$capsule->getConnection();
    }

    public static function medoo(): Medoo
    {
        if (!self::$medoo instanceof Medoo) {
            $db = App::instance()->config->get('db');

            self::$medoo = new Medoo([
                'database_type' => $db['type'],
                'server'        => $db['host'],
                'database_name' => $db['name'],
                'username'      => $db['user'],
                'password'      => $db['pass'],
            ]);
        }
        return self::$medoo;
    }

    public static function juggler(): Juggler
    {
        if (!self::$juggler instanceof Juggler) {
            $db = App::instance()->config->get('db');

            self::$juggler = new Juggler([
                'host'     => $db['host'],
                'dbname'   => $db['name'],
                'username' => $db['user'],
                'password' => $db['pass'],
                'charset'  => $db['charset'],
            ]);
        }
        return self::$juggler;
    }
}
