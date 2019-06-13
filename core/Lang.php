<?php

namespace test\core;

class Lang
{
    private $dir = ROOT . DS . 'app' . DS . 'lang' . DS;
    private $langs = [];
    public $logger;

    public function __construct(string $lang)
    {
        $this->logger = Logger::setLogger();
        $this->langs = $this->loadLang($lang);
    }

    private function loadLang(string $lang): array
    {
        $file = $this->dir . $lang . '.php';
        if (!file_exists($file)) {
            $message = 'Language file  "' . $lang . '" does not exist in  "' . $file . '".';
            if ($this->logger) {
                $this->logger->log(__CLASS__, $message);
            }
            die($message);
        }
        require_once $file;
        return $_LANG;
    }

    public function getLang(string $lang): string
    {
        if (!$this->langs[$lang]) {
            return "missing_lang_" . $lang;
        }
        return $this->langs[$lang];
    }
}