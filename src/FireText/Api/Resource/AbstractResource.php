<?php
namespace FireText\Api\Resource;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

abstract class AbstractResource implements ResourceInterface
{
    public function __construct()
    {
        $hydrator = new ClassMethods;
        $hydrator->setUnderscoreSeparatedKeys(false);
        foreach(array(
            'getHydrator',
        ) as $method) {
            $hydrator->addFilter($method, new Filter\MethodMatchFilter($method), Filter\FilterComposite::CONDITION_AND);
        }

        $this->setHydrator($hydrator);
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
