<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class Subscribe extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';

    protected $path = 'subscribe';
    
    protected $mobile;
    
    protected $firstname;
    
    protected $lastname;
    
    protected $custom1;
    
    protected $custom2;
    
    protected $custom3;
    
    protected $group;
    
    protected $update;
    
    public function __construct(Credentials $credentials, $mobile)
    {
        parent::__construct($credentials);
        
        $this->setMobile($mobile);
    }
    
    public function getMobile()
    {
        return $this->mobile;
    }
    
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }
    
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }
    
    public function getLastname()
    {
        return $this->lastname;
    }
    
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
    
    public function getCustom1()
    {
        return $this->custom1;
    }
    
    public function setCustom1($custom1)
    {
        $this->custom1 = $custom1;
        return $this;
    }
    
    public function getCustom2()
    {
        return $this->custom2;
    }
    
    public function setCustom2($custom2)
    {
        $this->custom2 = $custom2;
        return $this;
    }
    
    public function getCustom3()
    {
        return $this->custom3;
    }
    
    public function setCustom3($custom3)
    {
        $this->custom3 = $custom3;
        return $this;
    }
    
    public function getGroup()
    {
        return $this->group;
    }
    
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }
    
    public function getUpdate()
    {
        return $this->update;
    }
    
    public function setUpdate($update)
    {
        $this->update = $update;
        return $this;
    }
}
