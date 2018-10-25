<?php

class Section 
{
    private $pageID;
    private $contentID;
    private $title;
    private $content;
    private $imagepath;
    
    function __construct($pageID, $contentID, $title, $content, $imagepath = "")
    {
        $this->pageID = $pageID;
        $this->contentID = $contentID;
        $this->title = $title;
        $this->content = $content;
        $this->imagepath = $imagepath;
    }
    
    function getPageID() {
        return $this->pageID;
    }
    function setPageID($pageID) {
        $this->pageID = $pageID;
    }
    
    function getID() {
        return $this->contentID;
    }
    function setID($ID) {
        $this->contentID = $ID;
    }
    
    function getTitle() {
        return $this->title;
    }
    function setTitle($title) {
        $this->title = $title;
    }
    
    function getContent() {
        return $this->content;
    }
    function setContent($content) {
        $this->content = $content;
    }
    
    function getImagepath() {
        return $this->imagepath;
    }
    function setImagepath($imagepath) {
        $this->imagepath = $imagepath;
    }
}
