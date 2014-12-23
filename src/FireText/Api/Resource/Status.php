<?php
namespace FireText\Api\Resource;

class Status extends AbstractResource
{
    protected $code;
    
    protected $description;
    
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
