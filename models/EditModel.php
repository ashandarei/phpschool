<?php

class EditModel extends Model
{
    public $edit;
    public $page;
    public function __construct() 
    {
        parent::__construct();
        $this->text = "Article Text";
        $this->title = "Edit Mode";
    }        
    
    public function getSectionContent()
    {
        $db = new Project3DB();
        return $db->getAllSections($this->page);
    }
    
}
