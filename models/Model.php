<?php

class Model
{
    public $text;
    public $title;
    public $editable;
    public $loggedin;
    
     public function __construct() 
    {
        $this->text = "Default Text";
        $this->title = "Default Title";
        $this->editable = FALSE;
        
        $this->loggedin = TRUE;
    }        
    public function getSectionTitles()
    {
        return "default";
    }
    
}
