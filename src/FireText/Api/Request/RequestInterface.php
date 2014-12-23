<?php
namespace FireText\Api\Request;

interface RequestInterface
{
    const FORMAT_XML = 'xml';
    const FORMAT_JSON = 'json';
    const FORMAT_NOTHING = '';

    public function getRequestPath();
    
    public function getRequestParams();
    
    public function isPost();
}
