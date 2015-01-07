<?php
namespace FireText\Api\Resource;

class ReceivedMessage extends AbstractResource
{
    protected $messageId;
    
    protected $sentTo;
    
    protected $keyword;
    
    protected $receivedFrom;
    
    protected $receivedOn;
    
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
    
    public function getSentTo()
    {
        return $this->sentTo;
    }
    
    public function setSentTo($sentTo)
    {
        $this->sentTo = $sentTo;
        return $this;
    }
    
    public function getKeyword()
    {
        return $this->keyword;
    }
    
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
        return $this;
    }
    
    public function getReceivedFrom()
    {
        return $this->receivedFrom;
    }
    
    public function setReceivedFrom($receivedFrom)
    {
        $this->receivedFrom = $receivedFrom;
        return $this;
    }
    
    public function getReceivedOn()
    {
        return $this->receivedOn;
    }
    
    public function setReceivedOn($receivedOn)
    {
        $this->receivedOn = $receivedOn;
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
