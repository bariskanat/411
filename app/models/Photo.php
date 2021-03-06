<?php


class Photo extends Base{
    
    protected $table="photos";
    
    public function user()
    {
        return $this->belongsTo("User");
    }
    
    public function album()
    {
       return $this->belongsTo("Album");  
    }
    
    
    public function location($username)
    {
        return path()."/images/".$username."/";
    }
    
}


