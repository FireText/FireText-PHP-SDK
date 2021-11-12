<?php
namespace FireText\Api\Response\Parser;

use FireText\Api\Resource;

class Proprietary extends AbstractParser
{
    protected $document;

    public function __construct($response = null)
    {
        if(!is_null($response)) {
            $result = array();
            $result['data'] = explode("\n", $response);
            $result['code'] = substr($result['data'][0], 0, strpos($result['data'][0], ':'));
            $data = substr(strstr($result['data'][0], ':'), 1);
            $result['responseData'] = $data[0] == ' ' ? false : substr($data, 0, strpos($data, ' '));
            $result['description'] = array_shift($result['data']);
            $result['status'] = substr(strstr($data, ' '), 1);

            $this->setDocument($result);
        }
    }

    public function getStatus()
    {
        return $this->parseResource(new Resource\Status, $this->getDocument());
    }

    public function getResponseDataValue()
    {
        $document = $this->getDocument();
        return $document['responseData'];
    }

    public function getDataItems(Resource\ResourceInterface $type)
    {
        $data = array();

        $itemNodes = $this->getDocument();

        foreach ($itemNodes['data'] as $itemNode) {
            $data[] = $this->parseResource(clone $type, $itemNode);
        }

        return $data;
    }

    public function parseResource(Resource\ResourceInterface $type, $data)
    {
        $hydrator = $type->getHydrator();
        if (is_string($data)) {
            parse_str($data,$data);
        }
        return $hydrator->hydrate($data, $type);
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