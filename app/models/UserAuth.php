<?php

class UserAuth{
    
    protected $user;
    
    
    public function __construct($user)
    {
        $this->user=$user;
    }
    
    public function authenticate($password)
    {
        $user=false;
        
        $hash=(isset($this->user->password))?$this->user->password:null;
        
        if($hash && Hash::check($password,$hash)){
            $user=$this->user;
        }
        
        return $user;
    }
    
    
}

