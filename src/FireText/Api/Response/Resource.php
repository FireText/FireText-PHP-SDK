<?php
namespace FireText\Api\Response;

use FireText\Api\Resource as ResourceNS;

class Resource extends AbstractResponse
{
    protected $item;

    public static function parse(Parser\ParserInterface $parser, $responseResource)
    {
        $status = $parser->getStatus();
        $items = $parser->getDataItems($responseResource);
        $item = $items[0];
        
        return new self($status, $item);
    }
    
    public function __construct(ResourceNS\Status $status, $item)
    {
        parent::__construct($status);
        
        $this->setItem($item);
    }
    
    public function getItem()
    {
        return $this->item;
    }
    
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }
}
