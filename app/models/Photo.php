<?php


class Photo extends Base{
    
    protected $table="photos";
    
    public function user()
    {
        return $this->belongTo("User");
    }
    
    
}


