<?php

class UserController extends BaseController {

    
       protected $user;
       
       public function __construct(User $user)
       {        
         $this->user=$user;
         $this->beforeFilter('guest', ['only' =>['create']]);
         $this->beforeFilter('csrf', ['only' => ['postLogin',"updatephoto"]]);         
       }
       
       public function bbedit($id)
       {
           
           $user=$this->user->find($id);
           
           if(!$user) return Redirect::to("/");
           
           return json_encode([
               "firstname" =>$user->firstname,
               "lastname"  =>$user->lastname,
               "about"     =>$user->about,
               "id"        =>$user->id
           ]);
       }
       
       
       public function bbupdate($id)
       {
           $user=$this->user->find($id);
           $input=Input::json();
           
           if($user)
           {
               $user->firstname=$input->firstname;
               $user->lastname=$input->lastname;
               $user->about=$input->about;
               
               $user->save();
           }
           
           return $user;
          
           
       }
       
       
       public function userphoto($id)
       {
           $user=$this->user->find($id);
           
           return ($user) ? View::make("user.userphoto",["user"=>$user]):Redirect::to("/");
       }
       
       
       public function updatephoto($id)
       {
           $user=$this->user->find($id);      
          
           if($user && (Input::hasFile("picture")))
           {
               $result=Image::open($_FILES['picture']); 
               if($result){
                   
               }
           }
           
           return Redirect::back();
           
           
       }
         public function getUser($username)
         {

             $user=$this->user->where("username",$username)->first();         

             $permission=$this->user->permission($username);              

             return ($user)? View::make("user.userpage",array("user"=>$user,"perm"=>$permission)):Redirect::route("home");
         }
         
         public function edit($id)
         {
             $user=$this->user->find($id);
             
             return ($user)? View::make("user.useredit",["user"=>$user]):Redirect::route("home");
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