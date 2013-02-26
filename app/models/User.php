<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
	
        
       public static $rules=array(
            "username"              => "required|min:5|unique:users|max:70|alpha_dash",
            "email"                 => "required|email|unique:users",
            "password"              => "required|min:6|confirmed"        
        
       );
       
       public static function permission($username)
       {     
           if(!self::check_cred($username)) return false;            
                                     
           return true;           
       }
       
       private  static function check_cred($username)
       {
           $auth=App::make("UserSession")->user();
           
           if(!$auth) return false;
           
           $user=User::where("username",$username)->first();          
           
           if($auth->email!=$user->email || $auth->username!=$username) return false;         
          
           return true;
       }
       public static function val($input=null,$rules=null)
       {
           if(is_null($rules)) $rules=self::$rules;
               
           if(is_null($input)) $input=Input::all();
               
           return Validator::make($input,$rules);
       }
    
	
	public function page()
	{
		return $this->hasMany("Page");
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}