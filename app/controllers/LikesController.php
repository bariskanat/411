<?php


class LikesController extends BaseController
{
    protected $user;
    protected $likes;
    protected $photo;
    
    public function __construct(User $user,Like $likes,Photo $photo)
    {
        $this->user=$user;
        $this->likes=$likes;
        $this->photo=$photo;
    }
    
    public function index($id)
    {
     
        $query=AllQuery::getphotolikes();
        
        $result=DB::select($query,[$id]);       
        
        $userid=App::make("UserSession")->user()->id;
        
        $newarr=[];
        
     
        foreach($result as $r)
        {
            $newarr[] = [
                "userid"      => $r->userid,
                "id"          => $r->id,
                "content_id"  => $r->content_id,                
                "username"    => $r->username,
                "firstname"   => $r->firstname,
                "lastname"    => $r->lastname,
                "picture"     => $this->photo->location($r->username).$r->picture,
                "userlike"    => ($r->userid==$userid) ? true:false
        
            ];
        }
        
        return json_encode($newarr);
        
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
