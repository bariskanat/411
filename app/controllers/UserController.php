<?php

class UserController extends BaseController {

    
    
       public function __construct()
       {         
         $this->beforeFilter('guest', ['only' =>['create']]);
         $this->beforeFilter('csrf', ['only' => ['postLogin']]);         
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
            if(Auth::check())  return Redirect::to("/");
            $v=User::val();
            if($v->passes())
            {
                
                $result=User::create(array(
                    "username"  =>Input::get("username"),
                    "email"     =>Input::get("email"),
                    "password"  =>Hash::make(Input::get("password"))
                    
                    
                ));
              
                if($result)
                {                    
                    Auth::login($result,true);
             
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
                 
                 $result=User::where("username","{$input->data}")->first();
                 
                 return ($result)?json_encode(["data"=>"unavailable"]):json_encode(["data"=>"available"]);
             }
            
        }


        public function login()
        {
            return View::make("user.login");
        }
        
        public function postLogin()
        {
           $rules=[               
                    "email"       => "required|email",
                    "password"    => "required" 
                  ];
           $v=User::val(Input::all(), $rules);
           
           if($v->passes())
           {
               $user=[
                       "email"     =>Input::get("email"),
                       "password"  =>Input::get("password")
                     ];
               
               Auth::attempt($user,true);
               return (!Auth::check())
                            ?Redirect::back()->with("message","the password/username fields not match")
                            :Redirect::route("userpage",array(Auth::user()->username));;
               
           }else
           {
               return Redirect::back()->with("message","the password/username fields not match");
           }
               
        }
        
        public function logout()
        {
            Auth::logout();return Redirect::to("/");
        }

	

}