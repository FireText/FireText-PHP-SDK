<?php
namespace FireText\Api;

use ReflectionClass;

class Client
{
    protected $requestNamespace = 'FireText\Api\Request';

    protected $credentials;
    
    protected $httpClient;
    
    public function request($type)
    {
        $type = $this->requestNamespace.'\\'.$type;
        
        $requestParams = array_slice(func_get_args(), 1);
    
        return (new ReflectionClass($type))->newInstanceArgs(array_merge(array($this->getCredentials()), $requestParams));
    }
    
    public function __construct(Credentials $credentials = null, HttpClient $httpClient = null)
    {
        if(!is_null($credentials)) {
            $this->setCredentials($credentials);
        }
        
        if(!is_null($httpClient)) {
            $this->setHttpClient($httpClient);
        } else {
            $this->setHttpClient(new Http\Curl);
        }
    }
    
    public function execute(Request\RequestInterface $request)
    {
        $httpClient = $this->getHttpClone();
        
        $httpClient->setHeaders($request->getHeaders());
        
        if($request->isPost()) {
            $httpClient->setUrl($request->getRequestPath());
            $httpClient->setPostFields($request->getRequestParams());
        } else {
            $httpClient->setUrl($request->getRequestPath().'?'.http_build_query($request->getRequestParams()));
        }
        
        return $httpClient->execute();
    }
    
    public function getHttpClone()
    {
        $http = $this->getHttpClient();

        return clone $http;
    }
    
    public function getRequestNamespace()
    {
        return $this->requestNamespace;
    }
    
    public function setRequestNamespace($requestNamespace)
    {
        $this->requestNamespace = $requestNamespace;
        return $this;
    }
    
    public function getCredentials()
    {
        return $this->credentials;
    }
    
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }
    
    public function getHttpClient()
    {
        return $this->httpClient;
    }
    
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }
}
