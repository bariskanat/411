<?php 

class Base extends Eloquent {
	
	
    public static function validate($input=null)
    {
        if(is_null($input))
            $input=Input::all();
        
        return Validator::make($input,static::$rules);
    }
	
	
}

?>