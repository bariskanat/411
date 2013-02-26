<?php
class E{
    
    
    private static $td;
    private static $ivsize;
    
    
    private  static function initmcrypt()
    {
         self::$td = mcrypt_module_open('rijndael-256', '', 'cbc', '');
         self::$ivsize=mcrypt_enc_get_iv_size(self::$td);
    }
    
    
    
    
    private static function closemcrypt()
    {
         mcrypt_generic_deinit(self::$td);
         mcrypt_module_close(self::$td);
    }
    
    
    /**
     * 
     * @param type $value
     */
    public static function decode($value,$key)
    {
        
        
        $text=base64_decode($value);     
        self::initmcrypt();
        $iv=  substr($text,0,self::$ivsize);
        $text=substr($text,self::$ivsize);
        mcrypt_generic_init(self::$td, $key, $iv);
        $encrypted_data = mdecrypt_generic(self::$td, $text);
        self::closemcrypt();            
        return unserialize($encrypted_data);
    }
    
   
    
    /**
     * 
     * @param type $value
     */
    public static function encode($input,$key)
    {
        $input=  serialize($input); 
        self::initmcrypt();      
        $iv = mcrypt_create_iv(self::$ivsize, MCRYPT_RAND);
        mcrypt_generic_init(self::$td, $key, $iv);
        $encrypted_data = mcrypt_generic(self::$td, $input);
        self::closemcrypt();        
        return base64_encode($iv.$encrypted_data);
    }
    
    
  
}