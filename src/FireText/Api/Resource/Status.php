<?php
namespace FireText\Api\Resource;

use RuntimeException;

class Status extends AbstractResource
{
    protected $code;
    
    protected $description;
    
    public function getException()
    {
        return new RuntimeException($this->description, $this->code);
    }
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function setCode($code)
    {
        $this->code = (int) $code;
        return $this;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
