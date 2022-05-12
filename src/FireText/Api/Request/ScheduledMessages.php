<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class ScheduledMessages extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\ResourceList';
    
    protected $responseResourceType = 'FireText\Api\Resource\ScheduledMessage';

    protected $path = 'scheduledmessages';
    
    protected $subaccount;
    
    protected $pp;
    
    protected $page;
    
    public function getSubaccount()
    {
        return $this->subaccount;
    }
    
    public function setSubaccount($subaccount)
    {
        $this->subaccount = $subaccount;
        return $this;
    }
    
    public function getPp()
    {
        return $this->pp;
    }
    
    public function setPp($pp)
    {
        $this->pp = $pp;
        return $this;
    }
    
    public function getPage()
    {
        return $this->page;
    }
    
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }
}
