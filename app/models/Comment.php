<?php


class Comment{
    
    protected $table="comments";
    
    public function user()
    {
        return $this->belongTo("User");
    }
    
    public function photo()
    {
        return $this->belongTo("Photo");
    }
    
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
