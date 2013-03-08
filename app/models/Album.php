<?php



class Album extends Base{
    
    protected $tables="albums";
    
    public function user()
    {
        return $this->belongTo("User");
    }
    
    public function photos()
    {
        return $this->hasMany("Photo");
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
