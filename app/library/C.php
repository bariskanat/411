<?php

class C{   
    
    private static $httponly=true;
    
    private static $expire=2592000;  //1 month  
    
    private static $secure=false;
    
    private static $path="/";
    
    private static $domain=null;
    
   
   
    
    
   
    
    /**
     * 
     * @param string $name
     * @param mix $value
     */
    
    public  function set($name,$value)
    {
       
        $this->setcookie($name,$value);
    }
    
    /**
     * RETURN COOKIE IF IT IS SET
     * @param string $name
     * @return boolean
     */
    public  function get($name)
    {
        if(!$this->has($name))return false;
        $secret=$this->decode($_COOKIE[$name])['secret'];
      
        if($this->secret()!=$secret)
        {
           
            $this->delete($name);
            
        }
        else 
        {
            
            
            return $this->decode($_COOKIE[$name])['key'];
        }
    }
    
    /**
     * DELETE THE COOKIE
     * @param string $name
     * @return boolean
     */
    public function delete($name)
    {
        if(!$this->has($name))return false;
        unset($_COOKIE[$name]);
        return setcookie($name, NULL, time()-400, self::$path, self::$domain, self::$secure, self::$httponly);
    }
  
    
    /**
     * 
     * @param string $name
     * @return type
     */
    public  function has($name)
    {
        return $this->exists($name);
    }
    
    /**
     * 
     * @param string $name
     */
    private function exists($name)
    {
        return I::cookie($name);
    }
    
    
    public function secret($secret=null)
    {
        if(!is_null($secret)) return H::create_hash ($secret);
        $key=  I::user_agent().I::ip();
        return H::create_hash($key);
    }


    /**
     * set cokkie
     * @param string $name
     * @param mix $value
     */
    private  function setcookie($name,$value)
    {
        $info=["key"=>$value,"secret"=> $this->secret()];
        $value=$this->encode($info);         
        setcookie($name, $value,time()+ self::$expire, self::$path, self::$domain, self::$secure, self::$httponly);
        echo "<pre>";
        print_r($_COOKIE);
        echo "<hr/>";
        
    }    
   
    
    
    /**
     * return decrypted  information
     * @param type $value
     */
    public  function decode($value)
    {
        return E::decode($value, md5($this->secret()));
        
    }
    
   
    
    /**
     * return encrypted data
     * @param type $value
     */
    public  function encode($input)
    {
        return E::encode($input, md5($this->secret()));
        
    } 
    
    /**
     * 
     * @param string $key
     * @return boolean|\Cookie
     */
    public function setsecure($key)
    {
        if(!is_bool($key))return false;
        self::$secure=$key;
        return $this;
    }
    
    /**
     * 
     * @param int $time
     * @return boolean|\Cookie
     */
    public function settime($time=null)
    {
        if(is_null($time))return $this;
        if(!is_int($time) )return false;
        self::$expire=$time;
        return $this;
    }
    
    
    /**
     * 
     * @param string $host
     * @return \Cookie
     */
    public function sethost($host)
    {
        self::$domain=$host;
        return $this;
    }
    
    /**
     * 
     * @param string $path
     * @return \Cookie
     */
    
    public function setpath($path)
    {
        self::$path=$path;
        return $this;
    }
    
    
}