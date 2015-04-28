<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class AddGroup extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';

    protected $path = 'addgroup';
    
    protected $subaccount;
    
    protected $name;
    
    protected $description;
    
    protected $from;
    
    protected $api;
    
    public function __construct(Credentials $credentials, $name, $description, $from)
    {
        parent::__construct($credentials);
        
        $this->setName($name);
        $this->setDescription($description);
        $this->setFrom($from);
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
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
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
