<?php
namespace FireText\Api\Resource;

class Contact extends AbstractResource
{
    protected $firstname;
    
    protected $lastname;
    
    protected $mobile;
    
    protected $customField1;
    
    protected $customField2;
    
    protected $customField3;
    
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
    
    public function getMobile()
    {
        return $this->mobile;
    }
    
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }
    
    public function getCustomfield1()
    {
        return $this->customfield1;
    }
    
    public function setCustomfield1($customfield1)
    {
        $this->customfield1 = $customfield1;
        return $this;
    }
    
    public function getCustomfield2()
    {
        return $this->customfield2;
    }
    
    public function setCustomfield2($customfield2)
    {
        $this->customfield2 = $customfield2;
        return $this;
    }
    
    public function getCustomfield3()
    {
        return $this->customfield3;
    }
    
    public function setCustomfield3($customfield3)
    {
        $this->customfield3 = $customfield3;
        return $this;
    }
}
