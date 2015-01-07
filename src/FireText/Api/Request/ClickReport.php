<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;

class ClickReport extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Resource';
    
    protected $responseResourceType = 'FireText\Api\Resource\ClickReport';

    protected $path = 'clickreport';
    
    protected $message;
    
    protected $subaccount;
    
    protected $pp;
    
    protected $page;
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function setMessage($message)
    {
        $this->message = $message;
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
