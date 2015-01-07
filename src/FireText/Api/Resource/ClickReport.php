<?php
namespace FireText\Api\Resource;

class ClickReport extends AbstractResource
{
    protected $mobile;
    
    protected $firstName;
    
    protected $lastName;
    
    protected $clicked;
    
    protected $userAgent;
    
    public function getMobile()
    {
        return $this->mobile;
    }
    
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
    
    public function getClicked()
    {
        return $this->clicked;
    }
    
    public function setClicked($clicked)
    {
        $this->clicked = $clicked;
        return $this;
    }
    
    public function getUserAgent()
    {
        return $this->userAgent;
    }
    
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }
}
