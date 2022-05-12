<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials\CredentialsInterface as Credentials;

class AddSubaccount extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Success';

    protected $path = 'addsubaccount';
    
    protected $subaccount;
    
    protected $name;
    
    protected $notes;
    
    protected $messages;

    protected $email;

    protected $passphrase;

    protected $key;
    
    public function __construct(Credentials $credentials, $subaccount)
    {
        parent::__construct($credentials);
        
        $this->setSubaccount($subaccount);
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
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getNotes()
    {
        return $this->notes;
    }
    
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }
    
    public function getMessages()
    {
        return $this->messages;
    }
    
    public function setMessages($messages)
    {
        $this->messages = $messages;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassphrase()
    {
        return $this->passphrase;
    }

    public function setPassphrase($passphrase)
    {
        $this->passphrase = $passphrase;
        return $this;
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
