<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class Remove extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';

    protected $path = 'remove';
    
    protected $mobile;
    
    protected $group;

    protected $subaccount;

    protected $truncate;

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
    
    public function getGroup()
    {
        return $this->group;
    }
    
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    public function getTruncate()
    {
        return $this->truncate;
    }

    public function setTruncate($truncate)
    {
        $this->truncate = $truncate;
        return $this;
    }
}
