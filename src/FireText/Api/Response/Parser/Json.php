<?php
namespace FireText\Api\Response\Parser;

use FireText\Api\Resource;

class Json extends AbstractParser
{
    protected $jsonObject;

    public function __construct($response = null)
    {
        if(!is_null($response)) {
            $this->setJsonObject($response);
        }
    }

    public function getStatus()
    {
        return $this->parseResource(new Resource\Status, $this->getJsonObject());
    }

    public function getResponseDataValue()
    {
        $jsonObject = $this->getJsonObject();
        return $jsonObject->responseData;
    }

    public function getDataItems(Resource\ResourceInterface $type)
    {
        $data = array();

        $jsonObject = $this->getJsonObject();
        $itemNodes = $jsonObject->data;

        foreach($itemNodes as $itemNode) {
            $data[] = $this->parseResource(clone $type, $itemNode);
        }

        return $data;
    }

    public function parseResource(Resource\ResourceInterface $type, $jsonObject)
    {
        $hydrator = $type->getHydrator();

        $resourceData = array();

        foreach($jsonObject as $field => $value) {
            $resourceData[$field] = $value;
        }

        return $hydrator->hydrate($resourceData, $type);
    }

    public function getJsonObject()
    {
        return $this->jsonObject;
    }

    public function setJsonObject($json)
    {
        $this->jsonObject = json_decode($json);
        return $this;
    }
}
