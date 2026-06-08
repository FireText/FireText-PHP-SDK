<?php
namespace FireText;

abstract class AbstractTest extends \PHPUnit\Framework\TestCase
{
    protected static function provideFixtures($glob)
    {
        $result = array();
        
        foreach(glob(__DIR__.'/fixtures/'.$glob) as $document) {
            $result[] = array(
                file_get_contents($document),
            );
        }
        
        return $result;
    }

    public static function provideResponseDocuments()
    {
        return self::provideFixtures('*.response.xml');
    }
}
