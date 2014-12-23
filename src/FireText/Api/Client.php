<?php
namespace FireText\Api;

class Client
{
    protected $credentials;
    
    protected $httpClient;
    
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
        $http = $this->getHttp();

        return clone $http;
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
