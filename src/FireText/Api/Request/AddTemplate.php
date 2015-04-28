<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class AddTemplate extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';
    
    protected $path = 'addtemplate';
    
    protected $subaccount;
    
    protected $name;
    
    protected $message;
    
    protected $api;
    
    public function __construct(Credentials $credentials, $name, $message)
    {
        parent::__construct($credentials);
        
        $this->setName($name);
        $this->setMessage($message);
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
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
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
    
    public function getApi()
    {
        return $this->api;
    }
    
    public function setApi($api)
    {
        $this->api = $api;
        return $this;
    }
}
