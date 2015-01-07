<?php
namespace FireText\Api\Request;

use FireText\Api\Response\ResponseInterface;

class SendSmsTest extends \FireText\AbstractTest
{
    public function testResponseReturnsCorrectType()
    {
        $fixture = $this->provideFixtures('sendsms.response.xml')[0][0];
        
        $request = $this->getMockBuilder('FireText\Api\Request\SendSms')
            ->setMethods(null)
            ->disableOriginalConstructor()
            ->getMock();
        
        $request->setFormat(ResponseInterface::FORMAT_XML);
        
        $response = $request->response($fixture);
        
        $this->assertInstanceOf('FireText\Api\Response\Count', $response);
    }
}
