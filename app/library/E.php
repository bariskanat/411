<?php
class E{
    
    
    private  $td;
    private $ivsize;
    
    
    
    public function __construct() {
        $this->td=mcrypt_module_open('rijndael-256', '', MCRYPT_MODE_CBC, '');
        $this->ivsize=mcrypt_enc_get_iv_size($this->td);
                
    }
    
    
    
    
    
    private  function closemcrypt()
    {
         mcrypt_generic_deinit($this->td);
         mcrypt_module_close($this->td);
    }
    
    
    /**
     * 
     * @param type $value
     */
    public  function decode($value,$key)
    {
        
        
        $text=base64_decode($value);    
       
        $iv=  substr($text,0,$this->ivsize);
        $text=substr($text,$this->ivsize);
        mcrypt_generic_init($this->td, $key, $iv);
          $encrypted_data = mdecrypt_generic($this->td, $text);
       
        $this->closemcrypt();
          
        return unserialize($encrypted_data);
    }
    
   
    
    /**
     * 
     * @param type $value
     */
    public function encode($input,$key)
    {
        $input=  serialize($input); 
              
        $iv = mcrypt_create_iv($this->ivsize, MCRYPT_RAND);
        mcrypt_generic_init($this->td, $key, $iv);
        $encrypted_data = mcrypt_generic($this->td, $input);
        $this->closemcrypt();        
        return base64_encode($iv.$encrypted_data);
    }
    
    
  
}