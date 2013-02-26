<?php


class SessionController extends BaseController{
    
    
    public function getlogin()
    {
        return View::make("session.login");
    }
    
    public function postlogin()
    {
        $email    = Input::get("email");
        $password = Input::get("password");
        $user     = User::where("email",$email)->first();
       
        $auth=new UserAuthenticator($user);
        if($auth->authenticate($email,$password))
         {     
            App::make("UserSession")->start_session($user);
          
            return (!App::make("UserSession")->user())
                    ?Redirect::back()->with("message","the password/username fields not match")
                    :Redirect::route("userpage",array($user->username));;
            
        }else
        {            
            return Redirect::back()->with("message","the password/username fields not match");
        }
    }
    
    public function logout()
    {
        App::make("UserSession")->destroy();
        
        return Redirect::to("/");
    }
    
    
    
}





/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
