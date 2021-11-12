<?php
namespace FireText\Api\Response\Parser;

use FireText\Api\Resource;

class Json extends AbstractParser
{
    protected $document;

    public function __construct($response = null)
    {
        if(!is_null($response)) {
            $this->setDocument(json_decode($response));
        }
    }

    public function getStatus()
    {
        return $this->parseResource(new Resource\Status, $this->getDocument());
    }

    public function getResponseDataValue()
    {
        return $this->getDocument()->responseData;
    }

    public function getDataItems(Resource\ResourceInterface $type)
    {
        $data = array();

        $itemNodes = $this->getDocument();

        foreach($itemNodes->data as $itemNode) {
            $data[] = $this->parseResource(clone $type, $itemNode);
        }

        return $data;
    }

    public function parseResource(Resource\ResourceInterface $type, $data)
    {
        $hydrator = $type->getHydrator();

        $resourceData = array();

        foreach($data as $field => $value) {
            $resourceData[$field] = $value;
        }

        return $hydrator->hydrate($resourceData, $type);
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function setDocument($response)
    {
        $this->document = $response;
        return $this;
    }
}
