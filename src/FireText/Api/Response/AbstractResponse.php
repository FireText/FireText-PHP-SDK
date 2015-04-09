<?php
namespace FireText\Api\Response;

use FireText\Api\Resource;

abstract class AbstractResponse implements ResponseInterface
{
    protected $status;
    
    abstract public static function parse(Parser\ParserInterface $parser, $responseResource);
    
    public function __construct(Resource\Status $status)
    {
        $this->setStatus($status);
    }
    
    public function isSuccessful()
    {
        return $this->getStatus()
            ->getCode() === 0;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
