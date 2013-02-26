<?php

class Page extends Base{
    
    protected $table = 'pages';
    
    public static $rules=[];
    
    
    public function user()
    {
        return $this->belongsTo("User");
    }
    
    
    public function comments()
    {
        return $this->hasMany("Comment");
    }
    
    
    
    
}
?>
