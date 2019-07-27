<?php


namespace Trink\Core\Library;

/**
 * @property  array db
 * @property  array redis
 * @property  array rabbit
 *
 * @method array db(array $keyMap)
 */
class Config
{
    private static $instance;

    private $props;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __get($name)
    {
        return $this->props[$name];
    }

    public function __call($name, $arguments)
    {
        list($keyMap) = $arguments;
        $props    = $this->props[$name];
        $newProps = [];
        foreach ($keyMap as $key => $configKey) {
            $newProps[$key] = $props[$configKey];
        }
        return $newProps;
    }

    public static function instance()
    {
        if (!self::$instance instanceof self) {
            self::$instance        = new self();
            self::$instance->props = require_once dirname(dirname(__DIR__)) . '/config/config.php';
        }
        return self::$instance;
    }
}
