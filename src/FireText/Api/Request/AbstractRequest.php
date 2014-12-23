<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

abstract class AbstractRequest implements RequestInterface
{
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
        
        $this->setFormat(static::FORMAT_XML);
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
    
    public function isPost()
    {
        return $this->isPost;
    }
}
