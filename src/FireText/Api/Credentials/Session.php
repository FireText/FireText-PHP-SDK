<?php
namespace FireText\Api\Credentials;

class Session implements CredentialsInterface
{
    public static $login_url = 'https://app.firetext.co.uk/login';

    protected $cookie;
    
    public static function create_from_login(Login $login)
    {
        $ch = curl_init(static::$login_url);
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => array(
                'login' => 'Log In',
                'email' => $login->getUsername(),
                'password' => $login->getPassword(),
            ),
        ));
        
        $response = curl_exec($ch);
        
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $headerSize);
        
        preg_match('#Set-Cookie: PHPSESSID=(\w+);#', $headers, $matches);
        
        $sessionId = empty($matches[1])?null:$matches[1];
        
        return new static($sessionId);
    }
    
    public function __construct($cookie)
    {
        $this->setCookie($cookie);
    }
    
    public function getRequestParams()
    {
        return array();
    }
    
    public function getHeaders()
    {
        return array(
            'Cookie' => "PHPSESSID={$this->getCookie()}",
        );
    }
    
    public function getCookie()
    {
        return $this->cookie;
    }
    
    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
        return $this;
    }
}
