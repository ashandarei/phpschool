<?php
/**
 * Description of incident
 *
 * @author Aviendha
 */
class Controller 
{
    protected $model;
    protected $loggedin;

    public function __construct(Model $model) 
    {
        $this->model = $model;
        $this->loggedin = isset($_SESSION['username']);
    }
    
    public function getName()
    {
        return get_class($this);
    }
    
    public function logout()
    {
        session_destroy();
        header( 'Location: ./?route=index' );
    }
}
