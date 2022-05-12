<?php
namespace FireText\Api\Resource;

class Subaccount extends AbstractResource
{
    protected $accountId;
    
    protected $accountName;
    
    protected $accountNotes;
    
    public function getAccountId()
    {
        return $this->accountId;
    }
    
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }
    
    public function getAccountName()
    {
        return $this->accountName;
    }
    
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
        return $this;
    }
    
    public function getAccountNotes()
    {
        return $this->accountNotes;
    }
    
    public function setAccountNotes($accountNotes)
    {
        $this->accountNotes = $accountNotes;
        return $this;
    }
}
