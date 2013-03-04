<?php

trait message{
    
    public $messages=[];
    
    /**
     * 
     * @param string $key
     * @return mix
     */
    public function getMessage($key)
    {
        return (isset($this->messages[$key]))?$this->messages[$key]:false;
    }
    
    /**
     * 
     * @param string $key
     * @param mix $val
     */
    public function addMessage($key,$val)
    {
        $this->messages[$key]=$val;
    }
    
    /**
     * 
     * @param string $key
     * @return boolean
     */
    public function has($key)
    {
        return (array_key_exists($key, $this->messages));
    }
    
    
 
    
    
    /**
     * 
     * @return mix
     */
    public function allMessage()
    {
        return (count($this->messages))? $this->messages:false;
    }
    
    
    public function emptyAllMessage()
    {
        $this->messages=[];
    }
    
    /**
     * 
     * @return json
     */
    public function Messagejson()
    {
        return (count($this->messages))?json_encode($this->messages):false;
    }
}
