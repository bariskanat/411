<?php

class H
{
     
    private static $algo = '$2a';  
    
    private static $cost = '$10';  
    private static $salt="hG^&*vglrf_+#@jhfgjhk^&*bH()&8%nldku5647";
   
    
    /**
     *
     * @param string $password
     * @return string 
     */
    public static function unique_salt($password) {  
  
         return crypt(sha1(md5($password).sha1(self::$salt)),  sha1(static::$salt));
    }  
    
    /**
     *
     * @param string $password
     * @return  string
     */
      
    public static function create_hash($password) {  
        return sha1(crypt($password,  
                    self::$algo .  
                    self::$cost .  
                    '$' . self::unique_salt($password)));  
    }  
    
    
    /**
     *
     * @param string $hash
     * @param string $password
     * @return string 
     */
    
    public static function check_hash($hash,$password) {  
         
         return ($hash == self::create_hash($password));  
    }  

}
