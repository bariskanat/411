<?php


class PhotoController extends BaseController
{
    
    
    protected $user;
    
    protected $album;
    
    protected  $photo;
    
    public function __construct(User $user,Album $album,Photo $photo)
    {
        $this->user=$user;
        
        $this->album=$album;
        
        $this->photo=$photo;
    }
    
    public function getPhoto($id)
    {
        $photo=$this->photo->find($id);        
        
        if(!$photo) return Redirect::to("/");
        
        $user=$photo->user;
        
        $location=$this->photo->location($user->username);
        
        //$cperm=$this->getcommentperm($id);
        
        //$lperm=$this->getlikeperm($id);
        
        return View::make("photo.index",compact("photo","location","user"));
        
        
        
    }
    
    
    public function userinfo($id)
    {
        
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
