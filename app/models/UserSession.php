<?php

class UserSession{
    
    private $sessionname="userinfo";
    private $current;
    private $user_finder;
    
  
    
    public function session_start($user,$time=null){
        if(!is_null($time)&&  is_int($time))
            Config::set("Session.lifetime",$time);
        Session::put($this->sessionname,(int)$user->id);
        $this->current=$user;
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
