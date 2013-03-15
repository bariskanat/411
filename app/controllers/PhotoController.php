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
        
        $otherphoto=$this->getThisAlbumPhoto($photo->album->id,$id);
        
        $location=$this->photo->location($user->username);
        
        //$cperm=$this->getcommentperm($id);
        
        //$lperm=$this->getlikeperm($id);
        
        return View::make("photo.index",compact("photo","location","user","otherphoto"));
        
        
        
    }
    
    public function getThisAlbumPhoto($albumid,$id)
    {
        return $this->photo->where("album_id",$albumid)
                           ->whereNotIn('id', array($id))
                           ->orderBy('id', 'desc')
                           ->take(20)
                           ->get();
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
