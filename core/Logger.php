<?php

namespace test\core;

class Logger
{
    public static function setLogger()
    {
        if (!empty(LOGGER)) {
            if(file_exists(ROOT . DS . 'app' . DS . 'libs' . DS . 'loggers' . DS . 'providers' . DS . LOGGER . '.php')) {
                $logger = 'test\app\libs\loggers\\' . LOGGER;
                return new $logger();
            }
            die('Logger "'.LOGGER.'" not found.');
        }
        return null;
    }
}