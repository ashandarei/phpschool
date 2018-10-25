<?php


class FrontController 
{
    private $controller;
    private $view;
    
    public function __construct(Router $router, $routeName, $action = null, $param1 = null, $param2 = null) 
    {
        $route = $router->getRoute($routeName);
        $modelName = $route->model;
        $controllerName = $route->controller;
        $viewName = $route->view;
        
        $model = new $modelName;
        $this->controller = new $controllerName($model);
        $this->view = new $viewName($routeName, $model);
        
        if (!empty($action)) $this->controller->{$action}();
    }
    
    public function output() 
    {
        return $this->view->output();
    }
    
    public function outputTitle()
    {
        return $this->view->outputTitle();
    }
    
    public function getEditable()
    {
        return $this->view->getEditable();
    }
    
} 