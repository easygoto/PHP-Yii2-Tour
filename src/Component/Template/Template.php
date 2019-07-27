<?php

namespace Trink\Core\Component\Template;

/**
 *一个简单的模板引擎
 */
class Template
{
    private $arrayConfig = [
        'suffix'        => '.m',
        //设置模板文件的后缀
        'template_dir'  => '',
        //设置模板所在的文件夹
        'compile_dir'   => '',
        //设置编译后存放的目录
        'cache_htm'     => false,
        //是否需要编译成静态的HTML文件
        'suffix_cache'  => '.htm',
        //设置编译文件的后缀
        'cache_time'    => 2000,
        //多长时间自动更新,单位秒
        'php_turn'      => true,
        //是否支持原生PHP代码
        'cache_control' => 'control.dat',
        'debug'         => false,
    ];

    //模板文件名,不带路径
    public $file;
    //调试信息
    public $debug    = [];

    //值栈
    private $value = [];
    //编译器
    private $compileTool;

    private static $instance = null;

    /**
     * Template constructor.
     *
     * @param array $arrayConfig
     */
    public function __construct($arrayConfig = [])
    {
        $this->debug['begin'] = microtime(true);
        $this->arrayConfig    = $arrayConfig + $this->arrayConfig;
        $this->getPath();
        if (!is_dir($this->arrayConfig['template_dir'])) {
            exit("template dir isn't found");
        }
        if (!is_dir($this->arrayConfig['compile_dir'])) {
            mkdir($this->arrayConfig['compile_dir'], 0770, true);
        }
    }

    /**
     *路径处理为绝对路径
     */
    public function getPath()
    {
        $this->arrayConfig['template_dir'] = strtr(realpath($this->arrayConfig['template_dir']), '\\', '/') . '/';
        $this->arrayConfig['compile_dir']  = strtr(realpath($this->arrayConfig['compile_dir']), '\\', '/') . '/';
    }

    /**
     *取得模板引擎的实例
     *
     * @return object
     * @access public
     * @static
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Template();
        }
        return self::$instance;
    }

    /**
     *设置模板引擎的参数
     *
     * @param      $key
     * @param null $value
     */
    public function setConfig($key, $value = null)
    {
        if (is_array($key)) {
            $this->arrayConfig = $key + $this->arrayConfig;
        } else {
            $this->arrayConfig[$key] = $value;
        }
    }

    /**
     *获取当前模板引擎实例的配置,仅供调试信息时使用
     *
     * @param null $key
     *
     * @return array
     */
    public function getConfig($key = null)
    {
        if ($key) {
            return $this->arrayConfig[$key];
        } else {
            return $this->arrayConfig;
        }
    }

    /**
     *注入单个变量
     *
     * @param string $key   模板变量名
     * @param mixed  $value 模板变量的值
     *
     * @return void
     */
    public function assign($key, $value)
    {
        $this->value[$key] = $value;
    }

    /**
     *注入数组变量
     *
     * @param array $array
     */
    public function assignArray($array)
    {
        if (is_array($array)) {
            foreach ($array as $k => $v) {
                $this->value[$k] = $v;
            }
        }
    }

    /**
     * @return string
     */
    public function path()
    {
        return $this->arrayConfig['template_dir'] . $this->file . $this->arrayConfig['suffix'];
    }

    /**
     * 判断是否开启了缓存
     *
     * @return mixed
     */
    public function needCache()
    {
        return $this->arrayConfig['cache_htm'];
    }

    /**
     *是否需要重新生成静态文件
     *
     * @param$file
     *
     * @return bool
     */
    public function reCache($file)
    {
        $flag      = false;
        $cacheFile = $this->arrayConfig['compile_dir'] . md5($file) . '.htm';
        if ($this->arrayConfig['cache_htm'] === true) {
            //是否需要缓存
            $timeFlag = (time() - @filemtime($cacheFile)) < $this->arrayConfig['cache_time'] ? true : false;
            if (is_file($cacheFile) && filesize($cacheFile) > 1 && $timeFlag) {
                //缓存存在未过期
                $flag = true;
            } else {
                $flag = false;
            }
        }
        return $flag;
    }

    /**
     *显示模板
     *
     * @param$file
     */
    public function show($file)
    {
        $this->file = $file;
        if (!is_file($this->path())) {
            exit('找不到对应的模板');
        }
        $compileFile = $this->arrayConfig['compile_dir'] . md5($file) . '.php';
        $cacheFile   = $this->arrayConfig['compile_dir'] . md5($file) . '.htm';
        if ($this->reCache($file) === false) {
            $this->debug['cached'] = 'false';
            $this->compileTool     = new Compile($this->path(), $compileFile, $this->arrayConfig);
            if ($this->needCache()) {
                ob_start();
            }
            extract($this->value, EXTR_OVERWRITE);
            if (!is_file($compileFile) || filemtime($compileFile) < filemtime($this->path())) {
                $this->compileTool->vars = $this->value;
                $this->compileTool->compile();
                include $compileFile;
            } else {
                include $compileFile;
            }
            if ($this->needCache()) {
                $message = ob_get_contents();
                file_put_contents($cacheFile, $message);
            }
        } else {
            readfile($cacheFile);
            $this->debug['cached'] = 'true';
        }
        $this->debug['spend'] = microtime(true) - $this->debug['begin'];
        $this->debug['count'] = count($this->value);
        $this->debugInfo();
    }

    public function debugInfo()
    {
        if ($this->arrayConfig['debug'] === true) {
            echo PHP_EOL, '——debug info——', PHP_EOL;
            echo '程序运行日期:', date("Y-m-d h:i:s"), PHP_EOL;
            echo '模板解析耗时:', $this->debug['spend'], '秒', PHP_EOL;
            echo '模板包含标签数目:', $this->debug['count'], PHP_EOL;
            echo '是否使用静态缓存:', $this->debug['cached'], PHP_EOL;
            echo '模板引擎实例参数:', var_dump($this->getConfig());
        }
    }

    /**
     *清理缓存的HTML文件
     *
     * @param null $path
     */
    public function clean($path = null)
    {
        if ($path === null) {
            $path = $this->arrayConfig['compile_dir'];
            $path = glob($path . '*' . $this->arrayConfig['suffix_cache']);
        } else {
            $path = $this->arrayConfig['compile_dir'] . md5($path) . '.htm';
        }
        foreach ((array)$path as $v) {
            unlink($v);
        }
    }
}
