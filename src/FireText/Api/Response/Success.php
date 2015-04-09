<?php
namespace FireText\Api\Response;

use FireText\Api\Resource as ResourceNS;

class Success extends AbstractResponse
{
    public static function parse(Parser\ParserInterface $parser, $resource)
    {
        $status = $parser->getStatus();
        
        return new self($status);
    }
}
