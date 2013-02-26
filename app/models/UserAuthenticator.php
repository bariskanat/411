<?php

class UserAuthenticator{
    
    protected $user;
    
    public function __construct($user=null)
    {
        
        $this->user=($user)?$user:new User;
    }
    
    public function authenticate($email,$password)
    {
        $user        = false;
        $hash        = ($this->user->password)?$this->user->password:null;
        $useremail   = ($this->user->email)?$this->user->email:null;
       
        
        if($hash && Hash::check($password,$hash) && $useremail && $email==$useremail){
            $user=$this->user;
         
        }        
       
        
        return $user;
    }
}
?>
