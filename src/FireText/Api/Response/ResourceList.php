<?php
namespace FireText\Api\Response;

use FireText\Api\Resource as ResourceNS;

class ResourceList extends Count
{
    protected $items = array();

    public static function parse(Parser\ParserInterface $parser, $responseResource)
    {
        $status = $parser->getStatus();
        $count = $parser->getResponseDataValue();
        $items = $parser->getDataItems($responseResource);
        
        return new self($status, $count, $items);
    }
    
    public function __construct(ResourceNS\Status $status, $count, $items)
    {
        parent::__construct($status, $count);
        
        $this->setItems($items);
    }
    
    public function getItems()
    {
        return $this->items;
    }
    
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }
}
