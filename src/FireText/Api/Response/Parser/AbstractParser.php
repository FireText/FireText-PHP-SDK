<?php
namespace FireText\Api\Response\Parser;

use FireText\Api\Response\ResponseInterface;

abstract class AbstractParser implements ParserInterface
{
    protected static $parserMap = array(
        ResponseInterface::FORMAT_XML => 'FireText\Api\Response\Parser\Xml',
        ResponseInterface::FORMAT_JSON => 'FireText\Api\Response\Parser\Json',
        ResponseInterface::FORMAT_PROPRIETARY => 'FireText\Api\Response\Parser\Proprietary',
    );
    
    public static function parserForFormat($format)
    {
        return static::$parserMap[$format];
    }
}
