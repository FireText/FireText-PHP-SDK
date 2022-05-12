<?php
namespace FireText\Api\Http;

class Response
{
    protected $status;

    protected $body;

    protected $headers;

    public function __construct($body='', $headers=array(), $status=0)
    {
        $this->setBody($body);
        $this->setHeaders($headers);
        $this->setStatus($status);
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getHeader($header)
    {
        $header = strtolower($header);
        return isset($this->headers[$header]) ? $this->headers[$header] : null;
    }

    public function setHeaders($headers)
    {
        $this->headers = array_change_key_case($headers, CASE_LOWER);
        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function __toString()
    {
        return $this->body;
    }
}
