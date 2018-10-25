<?php
/**
 * Description of IncidentModel
 *
 * @author Aviendha
 */
class View
{
    protected $model;
    protected $route;
    
    
    public function __construct($route, Model $model) 
    {
        $this->route = $route;
        $this->model = $model;
    }
    
    public function outputTitle()
    {
        return $this->model->title;
    }      
    
    public function outputHeader()
    {
        return $this->model->header;
    }
    
    public function getEditable()
    {
        return $this->model->editable;
    }
}
