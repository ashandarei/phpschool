<?php
session_start();
require 'config/config.php';
require 'classes/Project3DB.class.php';
require 'classes/Member.class.php';
require 'classes/Section.class.php';
require 'classes/Tabler.class.php';

function __autoload($class_name)
{
    //class directories
    $directorys = array(
        'controllers/',
        'models/',
        'views/',
        'routers/',
        'templates/',
        'classes/'
    );

    //for each directory
    foreach($directorys as $directory)
    {
        //see if the file exsists
        if(file_exists($directory.$class_name . '.php'))
        {
            require($directory.$class_name . '.php');
            //only require the class once, so quit after to save effort (if you got more, then name them something else
            return;
        }           
    }
}
