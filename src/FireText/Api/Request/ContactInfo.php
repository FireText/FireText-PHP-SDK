<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class ContactInfo extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Resource';
    
    protected $responseResourceType = 'FireText\Api\Resource\Contact';

    protected $path = 'contactinfo';
    
    protected $mobile;

    protected $subaccount;

    public function __construct(Credentials $credentials, $mobile)
    {
        parent::__construct($credentials);
        
        $this->setMobile($mobile);
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
