<?php
/**
 * Description of incident
 *
 * @author Aviendha
 */
class FormController extends Controller 
{
    public function __construct(\Model $model) {
        parent::__construct($model);
        $this->model->title = ucfirst(htmlentities($_GET['route']));
    }


    public function register()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //default to 1 = admin
        $level = 1;
        
        $db = new Project3DB();
        $db->register($username, $password, $level);
    }
    
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $level = 1;
        
        $db = new Project3DB();
        
        $member = $db->login($username, $password);
        
        if ($member)
        {
            $_SESSION['level'] = $member->getPermission();
            $_SESSION['username'] = $member->getUsername();
            
            header( 'Location: ./?route=index' );
        }
        else echo "something went wrong. Perhaps check the config.php in-case I have forgotten to change user/pass";
    }
}
