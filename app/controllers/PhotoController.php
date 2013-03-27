<?php


class PhotoController extends BaseController
{
    
    
    protected $user;
    
    protected $album;
    
    protected  $photo;
    
    public function __construct()
    {
        $this->user=new User();
        
        $this->album=new Album();
        
        $this->photo=new Photo();
    }
    
    public function getPhoto($id)
    {
        $photo=$this->photo->find($id);        
        
        if(!$photo) return Redirect::to("/");
        
        $user=$photo->user;
        $authuser=null;
        if(($c=App::make("UserSession")->user())){
             $authuser=$c->id;
        }
       
        
        $otherphoto=$this->getThisAlbumPhoto($photo->album->id,$id);
        
        $location=$this->photo->location($user->username);
        
        $albums=$this->getOtherAlbum($user->id,$photo->album->id);
        
        return View::make("photo.index",compact("photo","location","user","otherphoto","albums","authuser"));
        
    }
    
    private function getOtherAlbum($userid,$albumid)
    {
       
         $query  = AllQuery::getuseralbum();
         $result = DB::select($query,[$userid,$albumid]);
         $query1 = AllQuery::getalbumphotos($result);
               
         $arr=$this->getalbumid($result);
         array_unshift($arr,$userid);        
        
         $result2=DB::select($query1, array_values($arr));
         
        
         return $this->getnewarry($result,$result2);

    }
    
    private function getnewarry($result,$result2)
    {
        $newarr=[];
        
        foreach((array)$result as $r)
        {
           $newarr[$r->id]=["id"=>$r->id,"name"=>$r->name];
           foreach($result2 as $v)
           {
               if(array_key_exists($v->id, $newarr))
               {
                   $newarr[$v->id]['file']=$v->file;
               }
           }
        }
        
        return $newarr;
    }
    
    private function getalbumid($result){
        
        $arr=[];
        foreach($result as $t)
        {
            $arr[]=$t->id;
        }
        return $arr;
        
    }
    
    
   
    
    public function getThisAlbumPhoto($albumid,$id)
    {
        return $this->photo->where("album_id",$albumid)
                           ->whereNotIn('id', array($id))
                           ->orderBy('id', 'desc')
                           ->take(7)
                           ->get();
    }
    
    
    public function userinfo($id)
    {
        
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
