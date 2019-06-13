<?php

namespace test\core;

class MainController
{
    protected $controller; 
    protected $action;
    public $view;
    public $request;
    public $logger;

    public function __construct(string $controller, string $action)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->request = new Input();
        $this->logger = Logger::setLogger();
        $this->view = new View();
        $this->setLangtoView();
    }

    protected function loadModel(string $model)
    {
        $modelPath = 'test\app\models\\' . $model;
        if (class_exists($modelPath)) {
            $this->{$model . 'Model'} = new $modelPath();
        }
    }

    private function setLangtoView()
    {
        $langObject = new Lang(LANG);
        $this->view->setLangs($langObject);
    }
}