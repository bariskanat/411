<?php

 class ProfileController extends BaseController{
     
     
     public function getUser($username)
     {
         $user=User::where("username",$username)->first();
            
         $permission=User::permission($username);
             
         return ($user)? View::make("user.userpage",array("user"=>$user,"perm"=>$permission)):Redirect::route("home");
     }
     
 }
?>
