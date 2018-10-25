<?php
/**
 * @author Aviendha
 */
class ArticleController extends Controller 
{
    public function __construct(\Model $model) 
    {
        parent::__construct($model);
    }

    
    public function edit()
    {
        $this->model->page = strip_tags($_GET['page']);
    }
    
    public function update()
    {
        if ($this->loggedin)
        {
            $update = strip_tags($_POST['update']);
        
            if($update == 'Apply Changes')
            {
                $sectionID = strip_tags($_POST['sectionid']);
                $title = strip_tags($_POST['title']);
                $content = strip_tags($_POST['content'], '<img>');
                $imagepath = strip_tags($_POST['imagepath']);

                $db= new Project3DB();
                $db->updateSection($sectionID, $title, $content, $imagepath);
            }
            else if ($update == 'Remove')
            {
                $db = new Project3DB();
                $db->removeSection(strip_tags($_POST['sectionid']));
            }
            else return false;
        }
    }
    
    public function addSection()
    {
        if ($this->loggedin)
        {
            $page = strip_tags($_GET['route']);
            $title = strip_tags($_POST['title']);
            $content = strip_tags($_POST['content'], '<img>');
            $imagepath = strip_tags($_POST['imagepath']);

            $db = new Project3DB();
            $db->addSection($page, $title, $content, $imagepath);
        }
    }
}
