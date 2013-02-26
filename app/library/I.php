<?php class I{
    
    /*
     * RETURN IP ADDRESS
     */
    public static function ip()
    {
        if (($ip=self::server("REMOTE_ADDR"))){}
        elseif(($ip=self::server("HTTP_X_FORWARDED_FOR"))){}
        elseif(($ip=self::server("HTTP_CLIENT_IP"))){}
        
        return (isset($ip))?$ip:false;       
    }
    
    
    /**
     * 
     * @return user agent
     */
    public static function user_agent()
    {
        return self::server("HTTP_USER_AGENT");
    }
    
    public static function server($name=null)
    {
        return self::hanle_input($_SERVER,$name);
    }
    
    
    /**
     * RETUN $_GET OR FALSE
     * @param string $name
     * @return mix
     */
    public static function get($name=null)
    {
       return self::hanle_input($_GET,$name);
    }
    
    /**
     * RETURN $_POST OR FALSE
     * @param string $name
     * @return mix
     */
    public static function post($name=null)
    {
       return self::hanle_input($_POST, $name);
    }
    
    /**
     * RETURN $_SESSION OR FALSE
     * @param string $name
     * @return mix
     */
    
    public static function session($name=null)
    {
        return self::hanle_input($_SESSION, $name);
    }
    
    /**
     * RETURN $_COOKIE OR FALSE
     * @param string $name
     * @return mix
     */
    
    public static function cookie($name=null)
    {
       return self::hanle_input($_COOKIE, $name);
    }
    
    /**
     * HANDLE THE REQUEST 
     * @param string $request
     * @param sting $name
     * @return mix
     */
    
    public static function hanle_input($request,$name=null)
    {
        if(!isset($request))return false;
        if(!is_null($name))
        {
            return (isset($request[$name]))?$request[$name]:false;
        }
        return $request;
    }
}