<?php

class UserSession{
    
    private $sessionname="userinfo";
    
    public function user_find($user){
        
        $this->user_finder=$user;
    }
    
    public function session_start($user){
        Session::put($this->sessionname,$user->id);
    }
    
    public function session_destroy(){
        Session::forget($this->sessionname);
    }
    
    
}
?>
