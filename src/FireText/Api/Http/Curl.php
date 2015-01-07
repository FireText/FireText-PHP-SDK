<?php
namespace FireText\Api\Http;

class Curl implements Client
{
    protected $curl;
    
    public function setUrl($url)
    {
        $this->setOption(CURLOPT_URL, $url);
    }
    
    public function setPostFields($fields)
    {
        $this->setOption(CURLOPT_POSTFIELDS, $fields);
    }

    public function setOption($name, $value)
    {
        curl_setopt($this->getCurl(), $name, $value);
    }

    public function setOptions($options)
    {
        curl_setopt_array($this->getCurl(), $options);
    }

    public function execute()
    {
        return curl_exec($this->getCurl());
    }

    public function getInfo($name)
    {
        return curl_getinfo($this->getCurl(), $name);
    }

    public function close()
    {
        curl_close($this->getCurl());
    }

    public function getCurl()
    {
        if (!$this->curl) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true
            ));
            $this->curl = $curl;
        }

        return $this->curl;
    }

    public function setCurl($curl)
    {
        $this->curl = $curl;

        return $this;
    }

    public function __clone()
    {
        $this->curl = curl_copy_handle($this->getCurl());
    }
}
