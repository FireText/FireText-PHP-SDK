<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class ReceivedMessages extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\ResourceList';
    
    protected $responseResourceType = 'FireText\Api\Resource\ReceivedMessage';

    protected $path = 'receivedmessages';
    
    protected $subaccount;
    
    protected $from;
    
    protected $to;
    
    protected $pp;
    
    protected $page;
    
    public function getRequestParams()
    {
        $params = parent::getRequestParams();
        
        if(!empty($params['from']) && ($params['from'] instanceof \DateTimeInterface)) {
            $params['from'] = static::format_timestamp($params['from'], 'Y-m-d');
        }
        
        if(!empty($params['to']) && ($params['to'] instanceof \DateTimeInterface)) {
            $params['to'] = static::format_timestamp($params['to'], 'Y-m-d');
        }
        
        return $params;
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
    
    public function getFrom()
    {
        return $this->from;
    }
    
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }
    
    public function getTo()
    {
        return $this->to;
    }
    
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }
    
    public function getPp()
    {
        return $this->pp;
    }
    
    public function setPp($pp)
    {
        $this->pp = $pp;
        return $this;
    }
    
    public function getPage()
    {
        return $this->page;
    }
    
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }
}
