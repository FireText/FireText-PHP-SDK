<?php
namespace FireText\Api\Http;

interface Client
{
    public function setUrl($url);
    public function setPostFields($fields);
    public function setHeaders($headers);
    public function execute();
}
