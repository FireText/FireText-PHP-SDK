<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;
use FireText\Api\Response\ResponseInterface;
use FireText\Api\Response\Parser\AbstractParser as ResponseParser;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

abstract class AbstractRequest implements RequestInterface
{
    protected $responseType;
    
    protected $responseResourceType;

    protected $basePath = 'https://www.firetext.co.uk/api';
    
    protected $path;
    
    protected $format;
    
    protected $credentials;
    
    protected $hydrator;
    
    protected $isPost = false;
    
    public function __construct(Credentials $credentials)
    {
        $this->setCredentials($credentials);
        
        $hydrator = new ClassMethods;
        $hydrator->setUnderscoreSeparatedKeys(false);
        foreach(array(
            'getRequestPath',
            'getRequestParams',
            'getBasePath',
            'getPath',
            'getFormat',
            'getCredentials',
            'getHydrator',
        ) as $method) {
            $hydrator->addFilter($method, new Filter\MethodMatchFilter($method), Filter\FilterComposite::CONDITION_AND);
        }

        $this->setHydrator($hydrator);
        
        $this->setFormat(ResponseInterface::FORMAT_XML);
    }
    
    public function response($response)
    {
        $parserType = ResponseParser::parserForFormat($this->getFormat());
        $parser = new $parserType($response);
    
        $responseType = $this->responseType;
        if(!is_null($this->responseResourceType)) {
            $responseResource = new $this->responseResourceType;
            $responseObject = $responseType::parse($parser, $responseResource);
        } else {
            $responseObject = $responseType::parse($parser, null);
        }
        
        return $responseObject;
    }
    
    public function getRequestPath()
    {
        return implode('/', array(
            $this->getBasePath(),
            $this->getPath(),
            $this->getFormat(),
        ));
    }
    
    public function getRequestParams()
    {
        $hydrator = $this->getHydrator();
        $credentials = $this->getCredentials();
        
        $params = array_replace(array(
            'username' => $credentials->getUsername(),
            'password' => $credentials->getPassword(),
        ), $hydrator->extract($this));
        
        return array_filter($params, function($value) {
            return !is_null($value);
        });
    }
    
    public function getBasePath()
    {
        return $this->basePath;
    }
    
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
        return $this;
    }
    
    public function getPath()
    {
        return $this->path;
    }
    
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }
    
    public function getFormat()
    {
        return $this->format;
    }
    
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }
    
    public function getCredentials()
    {
        return $this->credentials;
    }
    
    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }
    
    public function getHydrator()
    {
        return $this->hydrator;
    }
    
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }
    
    public function isPost()
    {
        return $this->isPost;
    }
}
