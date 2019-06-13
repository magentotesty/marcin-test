<?php

namespace test\app\libs\loggers;

class FileLogger implements Loggers
{
    public function log($action, $messages)
    {
        $fp = fopen(ROOT . DS . "logs" . DS . "logs_" . date("Y_m_d") . ".txt", 'a+');
        fwrite($fp, '[' . date('H:i') . '] ' . $action . " : " . $messages . "\n");
        fclose($fp);
    }
}