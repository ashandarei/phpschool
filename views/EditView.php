<?php
//@TODO: Make template for article

class EditView extends View
{
    
    public function output()
    {
        $sections = $this->model->getSectionContent();
        
        //Prints out all sections from the DB. GetSEctionContent() returns false if nothing found.
        if ($sections)
        {
            foreach ($sections as $items)
            {
                echo '<article >'
                            . '<form action="?route=' . $this->model->page . '&action=update" method="post">'
                            . "<h3>Title</h3>"
                            . '<textarea name="title" rows="1" cols="45">' . $items->getTitle() . "</textarea>" 
                            . '<h3>Content</h3>'
                            . '<textarea name="content" rows="10" cols="45">' . $items->getContent() . "</textarea>"
                            . "<h3>Image Path</h3>"
                            . '<input type="text" name="imagepath" value="' . $items->getImagepath() . '">'
                            . '<input type="hidden" name="sectionid" value="' . $items->getID() . '"><br />'
                            . '<input type="submit" name="update" value="Apply Changes"><br />'
                            . '<input type="submit" name="update" value="Remove">'
                            . '</form>'
                          . '</article>';
            }
        }
        //Always echo out add section.
        echo nl2br('<br><article>'
                            . '<form action="?route=' . $this->model->page . '&action=addSection" method="post">'
                            . "<h3>New Title</h3>"
                            . '<textarea name="title"></textarea>'
                            . "<h3>New Content</h3>"
                            . '<textarea name="content"></textarea>'
                            . "<h3>New Image Path</h3>"
                            . '<input type="text" name="imagepath"><br>'
                            . '<button>Add another row</button>'
                            . '</form>'
                          . '</article>');
    } 
    
    public function outputHeader()
    {
        return $this->model->header;
    }
}
