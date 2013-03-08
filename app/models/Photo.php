<?php


class Photo{
    
    protected $table="photos";
    
    public function user()
    {
        return $this->belongTo("User");
    }
    
    
}


