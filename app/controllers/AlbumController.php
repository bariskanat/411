<?php

class AlbumController extends BaseController {
    
    protected $user;
    
    public function __construct(User $user)
    {
        $this->user=$user;
    }
    public function getUserAlbum($id)
    {
        
        $user=$this->user->find($id);
        
        return ($user)?View::make("user.album",compact("user")):Redirect::route("home");
    }
    
    public function postUserAlbum($id)
    {
        
    }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
