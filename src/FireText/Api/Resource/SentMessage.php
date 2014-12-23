<?php
namespace FireText\Api\Resource;

class SentMessage extends AbstractResource
{
    protected $messageId;
    
    protected $sentOn;
    
    protected $sentTo;
    
    protected $groupDescription;
    
    protected $recipientCount;
    
    protected $templateApiId;
    
    protected $templateName;
    
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
    
    public function getSentOn()
    {
        return $this->sentOn;
    }
    
    public function setSentOn($sentOn)
    {
        $this->sentOn = $sentOn;
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
    
    public function getGroupDescription()
    {
        return $this->groupDescription;
    }
    
    public function setGroupDescription($groupDescription)
    {
        $this->groupDescription = $groupDescription;
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
    
    public function getTemplateApiId()
    {
        return $this->templateApiId;
    }
    
    public function setTemplateApiId($templateApiId)
    {
        $this->templateApiId = $templateApiId;
        return $this;
    }
    
    public function getTemplateName()
    {
        return $this->templateName;
    }
    
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
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
