<?php

class AlbumController extends BaseController {
    
    protected $user;
    
    protected $album;
    
    protected $photo;


    public function __construct(User $user,Album $album,Photo $photo)
    {
        $this->user=$user;
        
        $this->album=$album;
        
        $this->photo=$photo;
        
       $this->beforeFilter('csrf', ['only' => ['postUserAlbum','postUserAlbumPhoto']]); 
    }
    
    public function getUserAlbum($id)
    {
        
        $user=$this->user->find($id);
        
        return ($user)?View::make("user.album",compact("user")):Redirect::route("home");
    }
    
    public function postUserAlbum($id)
    {
       $user=$this->user->find($id); 
       
       $rules=[
           'picture'     => 'mimes:jpeg,jpg,gif,png',
           'albumname'   => 'required|min:3'
       ];
       
       $v= Validator::make(Input::all(),$rules);
       
       if($user && (Input::hasFile("picture")) && $v->passes())
       {
          $result=Image::open($_FILES['picture'],["thumbX"=>225,"thumbY"=>225]);
          
          $result->addfoldertopath($user->username)->crop(); 
          
          if($result->passes())
          {
              
              if($result->getImageX()<600 && $result->getImageY()<600){
                  
                  $result->move();
              }else{
                  
                  Image::open($_FILES['picture'])
                          ->addfoldertopath($user->username)
                          ->setthumbName("b_".$result->getThumb())
                          ->resize(600,600);
                
              
              }
              
             $imagename=$result->getThumbName();
             
             $album= $this->album->create([
                  "name"      => Input::get("albumname"),
                  "info"      => Input::get("about"),
                  "location"  => Input::get("location"),
                  "user_id"   => $id,
                  "type"      => 1
              ]);
             
             if($album)
             {
                 $this->photo->create([
                     "album_id"    =>  $album->id,
                     "user_id"     =>  $id,
                     "filename"    =>  $imagename,
                     "type"        =>   1
                 ]);
             }
             
             return ($album)?Redirect::route("photos",[$album->id]):Redirect::back()->with("error","something wen wron try again");
          }
          
          
       }       
       
       return Redirect::back()->withInput()->withErrors($v->messages());
    }
    
    
    public function getUserAlbumPhoto($id)
    {
        if(!$this->checkperm($id)) return Redirect::to("/");
        
        $album=$this->album->find($id);
        
        $user=$album->user;
        
        $photo=$album->photos;
        
        $location=path().DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR.$user->username.DIRECTORY_SEPARATOR;
        
        return View::make("album.useralbum",compact("album","user","photo","location"));
    }
    
    public function postUserAlbumPhoto($id)
    {
        if(!$this->checkperm($id)) return Redirect::to("/");
        
         $album=$this->album->find($id);
         
         $user=$album->user;
         
         $rules=['picture'=> 'mimes:jpeg,jpg,gif,png'];   
         
         $v= Validator::make(Input::all(),$rules);
         
         if((Input::hasFile("picture")) && $v->passes())
         {
              $result=Image::open($_FILES['picture'],["thumbX"=>225,"thumbY"=>225]);
          
              $result->addfoldertopath($user->username)->crop(); 
          
          if($result->passes())
          {
              
              if($result->getImageX()<600 && $result->getImageY()<600){
                  
                  $result->move();
              }else{
                  
                  Image::open($_FILES['picture'])
                          ->addfoldertopath($user->username)
                          ->setthumbName("b_".$result->getThumb())
                          ->resize(600,600);
                
              
              }
              
             $imagename=$result->getThumbName();
             
                 $this->photo->create([
                     "album_id"    =>  $album->id,
                     "user_id"     =>  $user->id,
                     "filename"    =>  $imagename,
                     "type"        =>   1
                 ]);
             
             
             return ($album)?Redirect::route("photos",[$album->id]):Redirect::back()->with("error","something wen wron try again");
          }
          
           return Redirect::back()->with("error","something wen wron try again");
             
         }
         
         return Redirect::back()->with("error","something wen wron try again");
    }
    
    public function deleteUserAlbum()
    {
        
    }
    
    
    public function checkperm($id)
    {
        $album=$this->album->find($id);
        
        $user= App::make("UserSession")->user();
        
        $u=$album->user;
       
        if(($u->id!=$user->id)|| ($u->email!=$user->email)|| ($u->username!=$user->username)) return false;
        
        return true;
    }
    
    public function updateUserAlbum(){}
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
