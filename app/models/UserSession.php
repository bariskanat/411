<?php


class UserSession{
    
    protected $user;
    protected static $current_user;
    protected $session_name="userinfo";
    
    public function __construct(User $user)
    {
        $this->user=$user;
    }
    
    public function start_session($user,$time=null)
    {
        self::$current_user=$user;
        App::make("c")->settime($time)->set($this->session_name,[
                    "email"=>self::$current_user->email,
                    "username" =>self::$current_user->username,
                    "id"  =>self::$current_user->id
                 ]);
        
      
        
        
    }
    
    public function destroy()
    {
        App::make("c")->delete($this->session_name);
    }
    
    
    public function user()
    {
        
        if(!self::$current_user)
        {
            self::$current_user=$this->user->find(App::make("c")->get($this->session_name)['id']);
        }        
    
        
        return (self::$current_user)?self::$current_user:false;
                
        
    }
    
    
    
}

?>
