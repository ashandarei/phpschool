<?php

class Router
{
    private $table = array();
    
    public function __construct() 
    {
        $this->table['index'] = new Route('ArticleModel', 'ArticleView', 'ArticleController');
        $this->table['ue4andoop'] = new Route('ArticleModel', 'ArticleView', 'ArticleController');
        $this->table['ue4andblueprint'] = new Route('ArticleModel', 'ArticleView', 'ArticleController');
        $this->table['ue4andcpp'] = new Route('ArticleModel', 'ArticleView', 'ArticleController');
        $this->table['projects'] = new Route('ArticleModel', 'ArticleView', 'ArticleController');
        $this->table['edit'] = new Route('EditModel', 'EditView', 'ArticleController');
        $this->table['register'] = new Route('FormModel', 'FormView', 'FormController');
        $this->table['login'] = new Route('FormModel', 'FormView', 'FormController');
    }
    
    public function getRoute($route) 
    {
        $route = strtolower($route);

        //Return a default route if no route is found
        if (!isset($this->table[$route])) {
            return $this->table['index'];    
        }
        
        return $this->table[$route];        
    } 
}
  