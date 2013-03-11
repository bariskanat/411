<?php


class Comment{
    
    protected $table="comments";
    
    public function user()
    {
        return $this->belongsTo("User");
    }
    
    public function photo()
    {
        return $this->belongsTo("Photo");
    }
    
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
