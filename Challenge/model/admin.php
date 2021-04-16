<?php
class Admin{
    protected $user_id, $password, $first_name, $last_name;
    
    function __construct($user_id, $password, $first_name, $last_name)
    {
        $this->user_id = $user_id;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    function getUser(){
        return $this->user_id;
    }
    function getpass(){
        return $this->password;
    }
    function getfirst_name(){
        return $this->first_name;
    }
    function getlast_name(){
        return $this->last_name;
    }
}
?>