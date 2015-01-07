<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;

class DeliveryReport extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Resource';
    
    protected $responseResourceType = 'FireText\Api\Resource\DeliveryReport';

    protected $path = 'deliveryreport';
    
    protected $message;
    
    protected $subaccount;
    
    protected $pp;
    
    protected $page;
    
    public function __construct(Credentials $credentials, $message)
    {
        parent::__construct($credentials);
        
        $this->setMessage($message);
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
