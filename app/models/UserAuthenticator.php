<?php

class UserAuthenticator{
    
    protected $user;
    
    public function __construct($user=null)
    {
        $this->user=($user)?$user:new User;
    }
    
    public function authenticate($email,$password)
    {
        $user=false;
        $hash=($this->user->password)?$this->user->password:null;
        
        if($hash && Hash::check($password,$hash) && $email==$this->user->email){
            $user=$this->user;
        }
        
        return false;
    }
}
?>
