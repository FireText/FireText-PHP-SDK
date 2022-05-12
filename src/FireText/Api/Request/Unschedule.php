<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class Unschedule extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';

    protected $path = 'unschedule';
    
    protected $message;
    
    protected $reference;

    protected $subaccount;

    public function __construct(Credentials $credentials, $message)
    {
        parent::__construct($credentials);

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

    public function getMessage()
    {
        return $this->message;
    }
    
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    
    public function getReference()
    {
        return $this->reference;
    }
    
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }
}
