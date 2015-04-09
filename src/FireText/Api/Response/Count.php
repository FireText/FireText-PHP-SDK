<?php
namespace FireText\Api\Response;

use FireText\Api\Resource as ResourceNS;

class Count extends AbstractResponse
{
    protected $count;
    
    public static function parse(Parser\ParserInterface $parser, $resource)
    {
        $status = $parser->getStatus();
        $count = $parser->getResponseDataValue();
        
        return new self($status, $count);
    }
    
    public function __construct(ResourceNS\Status $status, $count)
    {
        parent::__construct($status);
        
        $this->setCount($count);
    }

    public function getCount()
    {
        return $this->count;
    }
    
    protected function setCount($count)
    {
        $this->count = $count;
    }
}
