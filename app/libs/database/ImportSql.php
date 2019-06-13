<?php

namespace test\app\libs\database;

use test\core\DB;

class ImportSql
{
    public static function import(string $table)
    {
        $db = DB::getInstance();
        if(!file_exists(ROOT . DS . 'app' . DS . 'libs' . DS . 'database' . DS . 'sql' . DS . $table . '.sql')) {
            $message = 'File "'.$table.'.sql" not found.';
            if($db->logger) {
                $db->logger->log(__CLASS__, $message);
            }
            die($message);
        }

        $sql = file(ROOT . DS . 'app' . DS . 'libs' . DS . 'database' . DS . 'sql' . DS . $table . '.sql');
        $query = '';
        foreach ($sql as $line) {
            $start = substr(trim($line), 0, 2);
            $end = substr(trim($line), -1, 1);
            if (empty($line) || $start == '--' || $start == '/*' || $start == '//') {
                continue;
            }
            $query = $query . $line;
            if ($end == ';') {
                $db->query($query);
                $query = '';
            }
        }
    }
}