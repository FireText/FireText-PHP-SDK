<?php
namespace FireText\Api\Resource;

class ScheduledMessage extends AbstractResource
{
    protected $messageId;
    
    protected $queuedOn;
    
    protected $scheduledFor;

    protected $recipientCount;
    
    protected $sourceAddress;
    
    protected $sendTo;
    
    protected $message;
    
    public function getMessageId()
    {
        return $this->messageId;
    }
    
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
        return $this;
    }
    
    public function getQueuedOn()
    {
        return $this->queuedOn;
    }
    
    public function setQueuedOn($queuedOn)
    {
        $this->queuedOn = $queuedOn;
        return $this;
    }
    
    public function getSendTo()
    {
        return $this->sendTo;
    }
    
    public function setScheduledFor($scheduledFor)
    {
        $this->scheduledFor = $scheduledFor;
        return $this;
    }
    
    public function getScheduledFor()
    {
        return $this->scheduledFor;
    }
    
    public function setSourceAddress($sourceAddress)
    {
        $this->sourceAddress = $sourceAddress;
        return $this;
    }
    
    public function getRecipientCount()
    {
        return $this->recipientCount;
    }
    
    public function setRecipientCount($recipientCount)
    {
        $this->recipientCount = $recipientCount;
        return $this;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}
