<?php
namespace FireText\Api\Response;

use FireText\Api\Resource as ResourceNS;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

abstract class AbstractResponse implements ResponseInterface
{
    protected $hydrator;

    protected $status;

    public function __construct(ResourceNS\Status $status)
    {
        $this->setStatus($status);
        
        $hydrator = new ClassMethods;
        $hydrator->setUnderscoreSeparatedKeys(false);
        foreach(array(
            'getHydrator',
            'isSuccessful',
        ) as $method) {
            $hydrator->addFilter($method, new Filter\MethodMatchFilter($method), Filter\FilterComposite::CONDITION_AND);
        }

        $this->setHydrator($hydrator);
    }
    
    public function isSuccessful()
    {
        return $this->getStatus()
            ->getCode() === 0;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
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
}
