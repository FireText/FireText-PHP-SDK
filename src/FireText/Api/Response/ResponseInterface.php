<?php
namespace FireText\Api\Response;

interface ResponseInterface
{
    const FORMAT_XML = 'xml';
    const FORMAT_JSON = 'json';
    const FORMAT_PROPRIETARY = '';
    
    public static function parse(Parser\ParserInterface $parser, $responseResource);
}
