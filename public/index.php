<?php

use test\core;
use test\app\libs\database\ImportSql;

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('ROOT')) {
    define('ROOT', dirname(dirname(__FILE__)));
}

require_once ROOT . DS . 'app' . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'vendor' . DS . 'autoload.php';

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

if (IMPORT_SAMPLE_SQL_TABLES) {
    $db = core\DB::getInstance();
    if (!$db->show('trips') || !$db->show('trip_measures')) {
        ImportSql::import('trips');
        ImportSql::import('trip_measures');
    }
}

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];
core\Router::route($url);