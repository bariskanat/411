<?php

class UserController extends BaseController {

    
       protected $user;
       
       public function __construct(User $user)
       {        
         $this->user=$user;
         $this->beforeFilter('guest', ['only' =>['create']]);
         $this->beforeFilter('csrf', ['only' => ['postLogin']]);         
       }
       
       
         public function getUser($username)
         {

             $user=$this->user->where("username",$username)->first();         

             $permission=$this->user->permission($username);              

             return ($user)? View::make("user.userpage",array("user"=>$user,"perm"=>$permission)):Redirect::route("home");
         }
         
         public function edit(){
             echo "hello";
         }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
           
	       return View::make("user.index");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            if(App::make("UserSession")->user())  return Redirect::to("/");
            $v=User::val();
            if($v->passes())
            {
                
                $result=$this->user->create(array(
                    "username"  =>Input::get("username"),
                    "email"     =>Input::get("email"),
                    "password"  =>Hash::make(Input::get("password"))
                    
                    
                ));
              
                if($result)
                {                    
                    App::make("UserSession")->start_session($result);
             
                    return Redirect::route("userpage",array($result->username)); 
                }
                
                return Redirect::back()->withInput()->withErrors($v->messages());
            }
            
            return Redirect::back()->withInput()->withErrors($v->messages());
            
           
	}
        
        
        public function search()
        {
            if(!Request::ajax())return Redirect::to("/");               
            
            $input   = Input::json();
           
             if(!empty($input->data))
             {
                 
                 $result=$this->user->where("username","{$input->data}")->first();
                 
                 return ($result)?json_encode(["data"=>"unavailable"]):json_encode(["data"=>"available"]);
             }
            
        }



	

}