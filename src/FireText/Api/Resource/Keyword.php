<?php
namespace FireText\Api\Resource;

class Keyword extends AbstractResource
{
    protected $keywordId;
    
    protected $number;
    
    protected $keyword;
    
    protected $reference;
    
    public function getKeywordId()
    {
        return $this->keywordId;
    }
    
    public function setKeywordId($keywordId)
    {
        $this->keywordId = $keywordId;
        return $this;
    }
    
    public function getNumber()
    {
        return $this->number;
    }
    
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }
    
    public function getKeyword()
    {
        return $this->keyword;
    }
    
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
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
}
