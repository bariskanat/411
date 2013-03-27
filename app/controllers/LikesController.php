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
        
        if(count($result)<1)return json_encode([]);
        $userid=null;
        if(($user=App::make("UserSession")->user())){
            $userid=$user->id;
        }
        
        
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
    
    
    
    public function deletelike($photoid,$likeid)
    {
        $result=$this->likes->where(function($where) use ($photoid,$likeid){
            $where->where("content_type",1)
                  ->where("type",1)
                  ->where("id",$likeid)
                  ->where("content_id",$photoid);
            
        });
        
        if($result)
        {
            $result->delete();
        }
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
