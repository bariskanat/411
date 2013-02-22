<?php

class UserController extends BaseController {

    
    
       public function __construct()
       {
         $this->beforeFilter('guest', array('only' =>
                           array('create')));
         $this->beforeFilter('csrf', array('only' =>
                           array('postLogin')));
         
       }
       
       
     
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
          
            //return all users      
           
                
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

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show($username)
	{
	    $user=User::where("username",$username)->first();
            
            $permission=User::permission($username);
             
            return ($user)? View::make("user.userpage",array("user"=>$user,"perm"=>$permission)):Redirect::route("home");
              
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit($id=null)
	{
           
		
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
           
           if($v->passes()){
               $user=[
                   "email"  =>Input::get("email"),
                   "password"  =>Input::get("password")
               ];
               
               
               return (!Auth::attempt($user))
                            ?Redirect::back()->with("message","the password/username fields not match")
                            :Redirect::route("userpage",array(Auth::user()->username));;
               
           }else{
               return Redirect::back()->with("message","the password/username fields not match");
           }
               
        }
        
        public function logout()
        {
            Auth::logout();return Redirect::to("/");
        }

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}