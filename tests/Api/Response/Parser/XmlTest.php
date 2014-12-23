<?php
namespace FireText\Api\Response\Parser;

use PHPUnit_Framework_TestCase;

class XmlTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test getStatus method returns Status resource
     *
     * @param string $response
     * @dataProvider provideResponseDocuments
     */
    public function testGetStatus($response)
    {
        $xml = new Xml($response);
        
        $status = $xml->getStatus();
        
        $this->assertInstanceOf('FireText\Api\Resource\Status', $status);
        $this->assertInternalType('int', $status->getCode());
        $this->assertInternalType('string', $status->getDescription());
    }
    
    /**
     * Test getDocument method returns DOMDocument
     *
     * @param string $response
     * @dataProvider provideResponseDocuments
     */
    public function testGetDocument($response)
    {
        $xml = new Xml($response);
        
        $document = $xml->getDocument();
        
        $this->assertInstanceOf('DOMDocument', $document);
    }

    public function provideResponseDocuments()
    {
        $result = array();
        
        foreach(glob(__DIR__.'/fixtures/*.response.xml') as $document) {
            $result[] = array(
                file_get_contents($document),
            );
        }
        
        return $result;
    }
}
