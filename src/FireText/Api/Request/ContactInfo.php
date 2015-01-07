<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;

class ContactInfo extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Resource';
    
    protected $responseResourceType = 'FireText\Api\Resource\Contact';

    protected $path = 'contactinfo';
    
    protected $mobile;
    
    public function __construct(Credentials $credentials, $mobile)
    {
        parent::__construct($credentials);
        
        $this->setMobile($mobile);
    }
    
    public function getMobile()
    {
        return $this->mobile;
    }
    
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }
}
