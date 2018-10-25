<?php

class ArticleModel extends Model
{
    public $edit;
    public function __construct() 
    {
        parent::__construct();
        $this->text = "Article Text";
        $this->title = "";
        $this->edit = "Edit this page";
        $this->editable = TRUE;
    }        
    
    public function getSectionContent($page)
    {
        $db = new Project3DB();
        return $db->getAllSections($page);
    }
    
}
