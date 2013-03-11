<?php

class AlbumController extends BaseController {
    
    protected $user;
    
    public function __construct(User $user)
    {
        $this->user=$user;
        
       $this->beforeFilter('csrf', ['only' => ['postUserAlbum']]); 
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
              if($result->getImageX()<600 && $result->hetImageY()<600){
                  
                  $result->move();
              }else{
                  
                  $result->resize(600,600);
              }
              
             $imagename=$result->getThumbName();
             
             $album= Album::create([
                  "name"      => Input::get("albumname"),
                  "info"      => Input::get("about"),
                  "location"  => Input::get("location"),
                  "user_id"   => $id,
                  "type"      => 1
              ]);
             
             if($album)
             {
                 Photo::create([
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
    
    
    public function getAllAlbumByUser()
    {
        
    }
    
    public function deleteUserAlbum()
    {
        
    }
    
    public function updateUserAlbum(){}
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
