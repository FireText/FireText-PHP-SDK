<?php
namespace FireText\Api\Credentials;

interface CredentialsInterface
{
    public function getRequestParams();
    
    public function getHeaders();
}
