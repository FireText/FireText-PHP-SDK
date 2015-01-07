<?php
namespace FireText\Api\Resource;

class DeliveryReport extends AbstractResource
{
    protected $mobile;
    
    protected $firstName;
    
    protected $lastName;
    
    protected $messageSent;
    
    protected $messageUpdate;
    
    protected $status;
    
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
    
    public function getMessageSent()
    {
        return $this->messageSent;
    }
    
    public function setMessageSent($messageSent)
    {
        $this->messageSent = $messageSent;
        return $this;
    }
    
    public function getMessageUpdate()
    {
        return $this->messageUpdate;
    }
    
    public function setMessageUpdate($messageUpdate)
    {
        $this->messageUpdate = $messageUpdate;
        return $this;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}
