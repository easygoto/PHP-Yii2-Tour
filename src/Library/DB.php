<?php


namespace Trink\Core\Library;

use Illuminate\Database\Capsule\Manager as CapsuleManager;
use Illuminate\Database\Connection as IlluminateConnection;
use Medoo\Medoo;
use Upfor\Juggler\Juggler;

class DB
{
    private static $instance;
    private static $capsule;
    private static $medoo;
    private static $juggler;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function instance(): Medoo
    {
        if (!self::$instance instanceof self) {
            $db = Config::instance()->db;

            self::$instance = new Medoo([
                'database_type' => 'mysql',
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
            self::$capsule = new CapsuleManager;
            $dbConfig      = Config::instance()->db([
                'driver'    => 'type',
                'host'      => "host",
                'database'  => "name",
                'username'  => "user",
                'password'  => "pass",
                'charset'   => 'charset',
                'collation' => 'collation',
                'prefix'    => 'prefix',
            ]);
            self::$capsule->addConnection($dbConfig);
        }
        return self::$capsule->getConnection();
    }

    public static function medoo(): Medoo
    {
        if (!self::$medoo instanceof Medoo) {
            $dbConfig    = Config::instance()->db([
                'database_type' => 'type',
                'server'        => 'host',
                'database_name' => 'name',
                'username'      => 'user',
                'password'      => 'pass',
            ]);
            self::$medoo = new Medoo($dbConfig);
        }
        return self::$medoo;
    }

    public static function juggler(): Juggler
    {
        if (!self::$juggler instanceof Juggler) {
            $dbConfig      = Config::instance()->db([
                'host'     => 'host',
                'dbname'   => 'name',
                'username' => 'user',
                'password' => 'pass',
                'charset'  => 'charset',
            ]);
            self::$juggler = new Juggler($dbConfig);
        }
        return self::$juggler;
    }
}
