<?php
namespace FireText\Api;

class Credentials
{
    protected $username;
    
    protected $password;
    
    public function __construct($username, $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}
