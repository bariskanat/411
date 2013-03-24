<?php


class LikesController extends BaseController
{
    protected $user;
    protected $likes;
    
    public function __construct(User $user,Like $likes)
    {
        $this->user=$user;
        $this->likes=$likes;
    }
    public function index($id=null)
    {
        return $this->likes->where("content_id",$id)->get();       
    }
    
    public function delete($id)
    {
        
    }
    
    public function add($id)
    {
        
    }
    
   
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
