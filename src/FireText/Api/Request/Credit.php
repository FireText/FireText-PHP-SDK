<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;

class Credit extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Count';

    protected $path = 'credit';
    
    protected $subaccount;
    
    public function getSubaccount()
    {
        return $this->subaccount;
    }
    
    public function setSubaccount($subaccount)
    {
        $this->subaccount = $subaccount;
        return $this;
    }
}
