<?php
namespace FireText\Api\Resource;

class UnsubscribedContact extends Contact
{
    protected $addedOn;
    
    protected $unsubscribedOn;
    
    protected $reason;
    
    public function getAddedOn()
    {
        return $this->addedOn;
    }
    
    public function setAddedOn($addedOn)
    {
        $this->addedOn = $addedOn;
        return $this;
    }
    
    public function getUnsubscribedOn()
    {
        return $this->unsubscribedOn;
    }
    
    public function setUnsubscribedOn($unsubscribedOn)
    {
        $this->unsubscribedOn = $unsubscribedOn;
        return $this;
    }
    
    public function getReason()
    {
        return $this->reason;
    }
    
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }
}
