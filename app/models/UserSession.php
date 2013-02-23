<?php

class UserSession{
    
    private $sessionname="userinfo";
    private $current;
    private $user_finder;
    
    public function user_find($user){
        
        $this->user_finder=$user;
    }
    
    public function session_start($user){
        Session::put($this->sessionname,(int)$user->id);
    }
    
    public function session_destroy(){
        Session::forget($this->sessionname);
    }
    
    public function current_user(){
        
        if(!$this->current){
           $this->current= $this->user_finder->find(Session::get($this->sessionname));
        }
        
        return $this->current;
    }
}
?>
