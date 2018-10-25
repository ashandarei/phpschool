<?php
class Member 
{
    private $username;
    private $permission;
    
    function __construct($username, $permission) {
        $this->username = $username;
        $this->permission = $permission;
    }
    
    function getUsername() {
        return $this->username;
    }

    function getPermission() {
        return $this->permission;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPermission($permission) {
        $this->permission = $permission;
    }

    public function __toString() {
        
    }

}
