<?php

namespace test\core;

class View
{
    protected $head;
    protected $body;
    protected $outputBuffer;
    protected $langs;
            
    public function __construct()
    {
        
    }

    public function render(string $viewName)
    {
        $viewAry = explode('/', $viewName);
        $viewString = implode(DS, $viewAry);
        if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
            include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
            include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . 'default.php');
        } else {
            die('The view "' . $viewName . '" does not exist.');
        }
    }

    public function content(string $type)
    {
        if ($type == 'head') {
            return $this->head;
        } elseif ($type == 'body') {
            return $this->body;
        }
        return false;
    }

    public function start(string $type)
    {
        $this->outputBuffer = $type;
        ob_start();
    }

    public function end()
    {
        if ($this->outputBuffer == 'head') {
            $this->head = ob_get_clean();
        } elseif ($this->outputBuffer == 'body') {
            $this->body = ob_get_clean();
        } else {
            die('Run the start method first.');
        }
    }

    public function setLangs(Lang $lang)
    {
        $this->langs = $lang;
    }
}