<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class Forward extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';

    protected $path = 'forward';
    
    protected $subaccount;
    
    protected $keyword;
    
    protected $type;
    
    protected $destination;
    
    protected $remove;
    
    public function __construct(Credentials $credentials, $keyword, $destination)
    {
        parent::__construct($credentials);
        
        $this->setKeyword($keyword);
        $this->setDestination($destination);
        $this->setType(filter_var($destination, FILTER_VALIDATE_EMAIL) ? 'email' : (filter_var($destination, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) ? 'url' : 'mobile'));
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
    
    public function getKeyword()
    {
        return $this->keyword;
    }
    
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
        return $this;
    }
    
    public function getDestination()
    {
        return $this->destination;
    }
    
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    
    public function getRemove()
    {
        return $this->remove;
    }
    
    public function setRemove($remove='1')
    {
        $this->remove = $remove;
        return $this;
    }
}
