<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class UploadContacts extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';

    protected $path = 'uploadcontacts';
    
    protected $subaccount;
    
    protected $file;
    
    protected $md5sum;
    
    protected $group;
    
    protected $update;
    
    protected $columns;
    
    protected $postback;
    
    public function __construct(Credentials $credentials, $file, $group)
    {
        parent::__construct($credentials);
        
        $this->setFile($file);
        $this->setGroup($group);
        $this->setIsPost(true);
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
    
    public function getFile()
    {
        return $this->file;
    }
    
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }
    
    public function getMd5sum()
    {
        return $this->md5sum;
    }
    
    public function setMd5sum($md5sum)
    {
        $this->md5sum = $md5sum;
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
    
    public function getUpdate()
    {
        return $this->update;
    }
    
    public function setUpdate($update)
    {
        $this->update = $update;
        return $this;
    }
    
    public function getColumns()
    {
        return $this->columns;
    }
    
    public function setColumns($columns)
    {
        $this->columns = $columns;
        return $this;
    }
    
    public function getPostback()
    {
        return $this->postback;
    }
    
    public function setPostback($postback)
    {
        $this->postback = $postback;
        return $this;
    }
}
