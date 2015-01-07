<?php
namespace FireText\Api\Response\Parser;

class XmlTest extends \FireText\AbstractTest
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
}
