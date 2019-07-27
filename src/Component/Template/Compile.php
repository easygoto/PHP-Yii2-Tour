<?php

namespace Trink\Core\Component\Template;

/**
 * Class CompileClass
 *
 * @property array vars
 */
class Compile
{
    private $template;
    //待编译的文件
    private $content;
    //需要替换的文本
    private $comfile;
    //编译后的文件
    private $left = '{';
    //左定界符
    private $right = '}';
    //右定界符
    private $value = [];
    //值栈
    private $phpTurn;
    private $T_P = [];
    private $T_R = [];

    /**
     * CompileClass constructor.
     *
     * @param $template
     * @param $compileFile
     * @param $config
     */
    public function __construct($template, $compileFile, $config)
    {
        $this->template = $template;
        $this->comfile  = $compileFile;
        $this->content  = file_get_contents($template);
        if ($config['php_turn'] === false) {
            $this->T_P[] = "#<\?(=|php|)(.+?)\?>#is";
            $this->T_R[] = "&lt; ?\\1\\2?&gt;";
        }
        $this->T_P[] = "#\{\\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\}#";
        $this->T_P[] = "#\{(loop|foreach)\\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)}#i";
        $this->T_P[] = "#\{\/(loop|foreach|if)}#i";
        $this->T_P[] = "#\{([K|V])\}#";
        $this->T_P[] = "#\{if(.*?)\}#i";
        $this->T_P[] = "#\{(else if|elseif)(.*?)\}#i";
        $this->T_P[] = "#\{else\}#i";
        $this->T_P[] = "#\{(\#|\*)(.*?)(\#|\*)\}#";
        $this->T_R[] = "<?php echo \$this->value['\\1']; ?>";
        $this->T_R[] = "<?php foreach ((array)(\$this->value['\\2']) as \$K => \$V) { ?>";
        $this->T_R[] = "<?php } ?>";
        $this->T_R[] = "<?php echo \$\\1; ?>";
        $this->T_R[] = '<?php if(\\1) { ?>';
        $this->T_R[] = '<?php } elseif(\\2) { ?>';
        $this->T_R[] = '<?php } else { ?>';
        $this->T_R[] = '';
    }

    public function compile()
    {
        $this->compileVariable();
        $this->compileStaticFile();
        file_put_contents($this->comfile, $this->content);
    }

    public function compileVariable()
    {
        $this->content = preg_replace($this->T_P, $this->T_R, $this->content);
    }

    //加入对静态JavaScript文件的解析
    public function compileStaticFile()
    {
        $pattern       = '#\{\!(.*?)\!\}#';
        $this->content = preg_replace($pattern, '<script src=\\1?t=' . time() . '></script>', $this->content);
    }

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->$name;
    }
}
