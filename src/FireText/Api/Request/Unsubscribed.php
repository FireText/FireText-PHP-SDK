<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;

class Unsubscribed extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\ResourceList';
    
    protected $responseResourceType = 'FireText\Api\Resource\UnsubscribedContact';
    
    protected $path = 'unsubscribed';
    
    protected $group;
    
    protected $subaccount;
    
    protected $from;
    
    protected $to;
    
    protected $pp;
    
    protected $page;
    
    public function getGroup()
    {
        return $this->group;
    }
    
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }
    
    public function getSubaccount()
    {
        return $this->subaccount;
    }
    
    public function setSubaccount($subaccount)
    {
        $this->subaccount = $subaccount;
        return $this;
    }
    
    public function getFrom()
    {
        return $this->from;
    }
    
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }
    
    public function getTo()
    {
        return $this->to;
    }
    
    public function setTo($to)
    {
        $this->to = $to;
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