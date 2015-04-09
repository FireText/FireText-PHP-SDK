<?php
namespace FireText\Api\Request;

use FireText\Api\Credentials;

use DateTime,
    DateTimeZone;

class SendSms extends AbstractRequest
{
    protected $responseType = 'FireText\Api\Response\Count';

    protected $path = 'sendsms';
    
    protected $message;
    
    protected $from;
    
    protected $to;
    
    protected $schedule;
    
    protected $reference;
    
    protected $group;
    
    protected $receipt;
    
    protected $subaccount;
    
    protected $template;
    
    public function __construct(Credentials $credentials, $message, $from, $to)
    {
        parent::__construct($credentials);
        
        $this->setMessage($message);
        $this->setFrom($from);
        $this->setTo($to);
    }
    
    public function getRequestParams()
    {
        $params = parent::getRequestParams();
        
        if(!empty($params['schedule']) && ($params['schedule'] instanceof \DateTimeInterface)) {
            $params['schedule'] = static::format_timestamp($params['schedule'], 'Y-m-d H:i');
        }
        
        return $params;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    
    public function getFrom()
    {
        return $this->from;
    }
    
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }
    
    public function getTo()
    {
        return $this->to;
    }
    
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }
    public function getSchedule()
    {
        return $this->schedule;
    }
    
    public function setSchedule($schedule)
    {
        if(is_string($schedule)) {
            $schedule = new DateTime($schedule);
        }
    
        $this->schedule = $schedule;
        return $this;
    }
    
    public function getReference()
    {
        return $this->reference;
    }
    
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }
    
    public function getGroup()
    {
        return $this->group;
    }
    
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }
    
    public function getReceipt()
    {
        return $this->receipt;
    }
    
    public function setReceipt($receipt)
    {
        $this->receipt = $receipt;
        return $this;
    }
    
    public function getSubaccount()
    {
        return $this->subaccount;
    }
    
    public function setSubaccount($subaccount)
    {
        $this->subaccount = $subaccount;
        return $this;
    }
    
    public function getTemplate()
    {
        return $this->template;
    }
    
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
}
