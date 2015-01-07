<?php
namespace FireText\Api\Response\Parser;

use \DOMDocument;
use \DOMXPath;
use \DOMElement;

use FireText\Api\Resource;

class Xml extends AbstractParser
{
    protected $document;

    public function __construct($response = null)
    {
        if(!is_null($response)) {
            $document = new DOMDocument;
            $document->loadXML($response);
            
            $this->setDocument($document);
        }
    }
    
    public function getStatus()
    {
        $xpath = $this->getXPath();
        
        $status = $this->parseResource(new Resource\Status, $xpath->query('status')->item(0));
        
        return $status;
    }
    
    public function getResponseDataValue()
    {
        $xpath = $this->getXPath();
        
        $value = $xpath->query('data/@responseData')->item(0)->textContent;
        
        return $value;
    }
    
    public function getDataItems(Resource\ResourceInterface $type)
    {
        $xpath = $this->getXPath();
        $data = array();
        
        $itemNodes = $xpath->query('data/item');
        
        foreach($itemNodes as $itemNode) {
            $data[] = $this->parseResource(clone $type, $itemNode);
        }
        
        return $data;
    }
    
    public function parseResource(Resource\ResourceInterface $type, DOMElement $itemNode)
    {
        $xpath = $this->getXPath();
        $hydrator = $type->getHydrator();
        
        $resourceData = array();
        
        foreach($itemNode->childNodes as $childNode) {
            $resourceData[$childNode->nodeName] = $childNode->textContent;
        }
        
        return $hydrator->hydrate($resourceData, $type);
    }
    
    public function getDocument()
    {
        return $this->document;
    }
    
    public function setDocument($document)
    {
        $this->document = $document;
        return $this;
    }
    
    protected function getXPath()
    {
        return new DOMXPath($this->getDocument());
    }
}
