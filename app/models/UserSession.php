<?php


class UserSession{
    
    protected $user;
    protected $current_user;
    protected $session_name="ui";
    
    public function __construct(User $user)
    {
        $this->user=$user;
    }
    
    public function start_session($user,$time=null)
    {
        $this->current_user=$user;
        App::make("c")->settime($time)->set($this->session_name,[
                    "email"=>$this->current_user->email,
                    "username" =>$this->current_user->username,
                    "id"  =>$this->current_user->id
                 ]);
    }
    
    public function destroy()
    {
        App::make("c")->delete($this->session_name);
    }
    
    
    public function user()
    {
        if(!$this->current_user)
        {
            $this->current_user=$this->user->find(App::make("c")->get($this->session_name)['id']);
        }
        
        return ($this->current_user)?$this->current_user:false;
                
        
    }
    
    
    
}

?>
