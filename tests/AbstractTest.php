<?php
namespace FireText;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    protected function provideFixtures($glob)
    {
        $result = array();
        
        foreach(glob(__DIR__.'/fixtures/'.$glob) as $document) {
            $result[] = array(
                file_get_contents($document),
            );
        }
        
        return $result;
    }

    public function provideResponseDocuments()
    {
        return $this->provideFixtures('*.response.xml');
    }
}
