<?php
namespace FireText\Api\Response;

abstract class Response implements ResponseInterface
{
    protected $status;
    
    public function __construct(Status $status)
    {
        $this->setStatus($status);
    }
}
