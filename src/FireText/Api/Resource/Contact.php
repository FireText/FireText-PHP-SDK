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
        return $this->customField1;
    }
    
    public function setCustomfield1($customField1)
    {
        $this->customField1 = $customField1;
        return $this;
    }
    
    public function getCustomfield2()
    {
        return $this->customField2;
    }
    
    public function setCustomfield2($customField2)
    {
        $this->customField2 = $customField2;
        return $this;
    }
    
    public function getCustomfield3()
    {
        return $this->customField3;
    }
    
    public function setCustomfield3($customField3)
    {
        $this->customField3 = $customField3;
        return $this;
    }
}
