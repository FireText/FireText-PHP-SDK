<?php
namespace FireText\Api\Request;

interface RequestInterface
{
    public function getRequestPath();
    
    public function getRequestParams();
    
    public function getIsPost();
}
