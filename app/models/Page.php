<?php 

class Page extends Base{
	
	
    protected $table = 'pages';
    static $rules=[];


    public function user()
    {
            return $this->belongs_to("user");
    }
	
}


?>