<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;

class TransferCredit extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';

    protected $path = 'transfercredit';
    
    protected $subaccount;
    
    protected $type;
    
    protected $amount;
    
    public function __construct(Credentials $credentials, $subaccount, $type, $amount)
    {
        parent::__construct($credentials);
        
        $this->setSubaccount($subaccount);
        $this->setType($type);
        $this->setAmount($amount);
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
    
    public function getType()
    {
        return $this->type;
    }
    
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    
    public function getAmount()
    {
        return $this->amount;
    }
    
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }
}
