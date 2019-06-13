<?php

namespace test\core;

use test\app\controllers;

class Router
{
    public static function route($url)
    {
        $controller = (!empty($url[0])) ? ucwords($url[0]) . 'Controller' : 'HomeController';
        $controllerName = str_replace('Controller', '', $controller);
        $controllerPath = 'test\app\controllers\\' . $controller;
        if (!class_exists($controllerPath)) {
            die('The controller "' . $controllerName . '" does not exist.');
        }
        
        array_shift($url);
        $action = (!empty($url[0])) ? $url[0] . 'Action' : 'indexAction';
        array_shift($url);
        $params = $url;

        $dispatch = new $controllerPath($controllerName, $action);
        if (method_exists($controllerPath, $action)) {
            call_user_func_array([$dispatch, $action], $params);
        } else {
            die('That method does not exist in the controller "' . $controllerName . '"');
        }
    }

    public static function redirect(string $location)
    {
        header('Location: ' . SERVER_DIRECTORY . $location);
        exit();
    }
}