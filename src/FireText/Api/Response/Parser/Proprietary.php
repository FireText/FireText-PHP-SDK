<?php
namespace FireText\Api\Response\Parser;

use FireText\Api\Resource;

class Proprietary extends AbstractParser
{
    protected $plaintext;

    public function __construct($response = null)
    {
        if(!is_null($response)) {
            $this->setPlaintext($response);
        }
    }

    public function getStatus()
    {
        return $this->parseResource(new Resource\Status, $this->getPlaintext());
    }

    public function getResponseDataValue()
    {
        $response = $this->getPlaintext();
        $split = explode(' ', $response[0], 2);
        return substr($split[0], strlen(substr($split[0], 0, strpos($split[0],':')))+1);
    }

    public function getDataItems(Resource\ResourceInterface $type)
    {
        $data = array();

        $response = $this->getPlaintext();
        array_shift($response);

        foreach($response as $row) {
            $data[] = $this->parseResource(clone $type, $row);
        }

        return $data;
    }

    public function parseResource(Resource\ResourceInterface $type, $response)
    {
        $hydrator = $type->getHydrator();

        $resourceData = array();

        if (preg_match("/Status$/", get_class($type))) {
            $split = explode(' ', $response[0], 2);
            $resourceData = array(
                'code' => intval(substr($split[0], 0, strpos($split[0],':'))),
                'description' => $split[1]
            );
        } else {
            if (preg_match("/&[a-zA-Z]+=/", $response)) {
                foreach (explode('&', $response) as $value) {
                    list($f, $v) = explode('=', $value, 2);
                    $resourceData[$f] = urldecode($v);
                }
            } else {
                $resourceData = $response;
            }
        }

        return $hydrator->hydrate($resourceData, $type);
    }

    public function getPlaintext()
    {
        return $this->plaintext;
    }

    public function setPlaintext($response)
    {
        $response = explode("\n", $response);
        $this->plaintext = $response;
        return $this;
    }
}