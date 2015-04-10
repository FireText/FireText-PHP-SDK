<?php
namespace FireText\Api\Credentials;

class ApiKey implements CredentialsInterface
{
    protected $key;
    
    public function __construct($key)
    {
        $this->setKey($key);
    }
    
    public function getRequestParams()
    {
        return array(
            'apiKey' => $this->getKey(),
        );
    }
    
    public function getHeaders()
    {
        return array();
    }
    
    public function getKey()
    {
        return $this->key;
    }
    
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }
}
