<?php

class Image{
    
    use message;
    
    private $resource;
    private $image;
    private $thumbX=200;
    private $thumbY=200;
    private $thumbName;   
    private $thumbExt;
    private $size=4194304;
    private $imageX;
    private $filter=[];
    private $imageY;
    private $imageName;
    private $imageExt;
    private $imagesize;
    private $allowed=["jpeg","jpg","gif","png"];
    private $path;
    private $attributes=["thumbX","thumbY","thumbExt","thumbName","size","path","filter"];
    
    public function __construct($image,$info=null)
    {
        $this->imagepath(); 
        
        $this->resource=(is_array($image))?$image['tmp_name']:$image;
        
        $this->getimageinfo($image);
        
        if(!$this->checkerror())
        {           
            $this->createimage();
            if(!is_null($info))
            $this->setattributes($info);
        }
        
    }
    
    
    public function passes()
    {
        return (!$this->checkerror() || $this->checkthumbfile())?true:false;        
    }
    
    public function checkthumbfile()
    {
        $path=$this->getpath().$this->thumbName.".".$this->imageExt;
        
        return file_exists($path);
    }
    
    
    public function checkerror()
    {
        return ($this->allMessage())?true:false;
    }
    
    public function imagepath()
    {
        $this->path=dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR."public/images/";
    }
    
    public static function  getuserpicdir()
    {
        return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR."public/images/";
    }
    public function addfoldertopath($name)
    {
        if(!is_dir($this->path.$name))  mkdir($this->path.$name);      
        $this->path=$this->path.$name.DIRECTORY_SEPARATOR;     
        return $this;
    }
    public function setpath($path)
    {
        $this->path=$path;
        return $this;
    }
    
    public function getpath()
    {
        return $this->path;
    }
    
    
    public function getimageinfo($image)
    {
           $filext=(is_array($image))?pathinfo($image['name'])["extension"]:pathinfo($image)["extension"];
                  
           if($this->allowed(strtolower($filext)))          
               $this->setimagevalue($image);
           else
               $this->addMessage ("extension", "image extension is not allowed");
           
    }
    
    private function setimagevalue($image)
    {
       $imageinfo=(is_array($image))?pathinfo($image['name']):pathinfo($image);
       $this->resource=(is_array($image))?$image['tmp_name']:$image;
       $this->imagesize=(is_array($image))?$image['size']:filesize($image);
       $this->imageName=$imageinfo['filename'];
       $this->imageExt=$imageinfo['extension'];
       $this->imageX=getimagesize($this->resource)[0];
       $this->imageY=getimagesize($this->resource)[1];
       
    }




    public function allowed($ext)
    {
        return in_array($ext,$this->allowed);
    }
    
    public function setAllowedExt($info)
    {
        if(!is_array($info))return  false;
        
        $this->allowed=$info;
        
        return $this;
    }
    
    public function getImageX()
    {
        return $this->imageX;
    }
    
    public function getImageY()
    {
        return $this->imageX;
    }
    
    public function getImageSize()
    {
        return $this->imagesize;
    }
    
    
    public function move($name=null)
    {
        $name=(!is_null($name))?$name:"b_".$this->thumbName;
        
        @move_uploaded_file($this->resource, $this->getpath().$name.".".$this->imageExt);
    }
    
    private function setattributes($info)
    {
        if(!is_array($info))return false;
        
        $this->fill($info);       
        
        return $this;
    }
    
    private function fill($info)
    {
        
        foreach($info as $key=>$val)
        {
            if(in_array($key,$this->attributes))
            {
                if($key=="filter"){
                   
                    $this->setfilter($val);                  
                    
                }else{
                    $this->{$key}=$val;
                }
                
            }
        }
    }
    
    
    public function setfilter($val)
    {
        
        foreach(explode(",",$val) as $key)
        {
            $this->filter[]=$key;
        }
        
        return $this;
    }
    
    
    public static function open($image,$info=null)
    {    
        return new static($image,$info);
    }    
    
    public function getImageExt()
    {
        return $this->imageExt;
    }
    
     public function getThumbName()
     {
         return $this->thumbName.".".$this->imageExt;
     }
     
     public function getThumbExt()
     {
         return $this->thumbExt;
     }
     
     private  function scale()
     {
        $thumb_ratio=$this->thumbX/$this->thumbY;  
        
        $ratio=$this->imageX/$this->imageY;

        if($thumb_ratio>$ratio)
        {
           $this->thumbX=$this->thumbY*$ratio;
        }
        else
        {
            $this->thumbY=$this->thumbX/$ratio;
        }

     }
    
     public function resize($width=null,$height=null,$dest=null)
     {      
            if($this->checkerror())return $this;
            
            $this->setwidthandheight($width,$height);
            
            $this->scale();
            
            $thumb=imagecreatetruecolor($this->thumbX,$this->thumbY); 
            
            return $this->_resize($thumb,0,0,0,0,$this->thumbX,$this->thumbY,$this->imageX, $this->imageY,$dest);   
                
     }
     
     private function setwidthandheight($width=null,$height=null)
     {
          $this->thumbX=(is_null($width))?$this->thumbX:$width;
          
          $this->thumbY=(is_null($height))?$this->thumbY:$height;
     }
     
     private function _resize($thumb,$x,$y,$picture_x,$picture_y,$thumb_width=null,$thumb_height=null , $picture_width=null, $picture_height=null,$dest=null)
     {
            $img=$this->createimage();
            imagecopyresampled($thumb, $img, $x, $y,$picture_x,$picture_y,$thumb_width,$thumb_height , $picture_width, $picture_height);                    
            $this->image=$thumb;          
            $this->save($dest);  
            $this->destroy($thumb,$img);
            return $this;              
     }
    
    public function crop($width=null,$height=null)
    {
        $this->setwidthandheight($width,$height);  
        
        if(!$this->checkthumbsize()) return $this;
        
        list($x,$y,$w)=$this->setcropsize();
       
        $thumb=imagecreatetruecolor($this->thumbX,$this->thumbY);
        
        return $this->_resize($thumb,0,0,$x,$y,$this->thumbX,$this->thumbY,$w,$w);   
    }
    
    private function setcropsize()
    {
        if($this->imageX>$this->imageY){
            
           return [($this->imageX-$this->imageY)/2,0,$this->imageY];
           
        }elseif($this->imageX<$this->imageY){
            
            return[0,($this->imageX-$this->imageY)/2,$this->imageX];
            
        }else{  
            
            return [0,0,$this->imageX];
        }        
        
    }
    
    
    private function checkthumbsize()
    {
      if(($this->imageX-$this->thumbX < 0) || ($this->imageY-$this->thumbY < 0) )
      {
          $this->addMessage("thumb size", "the picture is small");
          
          return false;
      }
      
      return true;
         
    }
    
     public function gray()
     {
         imagefilter($this->image, IMG_FILTER_GRAYSCALE);
         return $this;
     }
     
     public function blur()
     {
         imagefilter($this->image, IMG_FILTER_GAUSSIAN_BLUR);
         return $this;
     }
     
    public function sketch() 
    {
        imagefilter($this->image, IMG_FILTER_MEAN_REMOVAL);
        return $this;

    }



 
     public function invert()
     {
            imagefilter($this->image, IMG_FILTER_NEGATE);
            return $this;
     }

 
     
     private function createimage()
     {
            $src_image=getimagesize($this->resource);

            switch ($src_image['mime'])
            {
                case 'image/jpeg';                                
                    $this->image=imagecreatefromjpeg($this->resource);                                
                break;
                case 'image/png';                               
                    $this->image=imagecreatefrompng($this->resource);
                    imageAlphaBlending($this->resource, false);
                    imageSaveAlpha($this->resource, true);                                
                break;
                case 'image/gif';                              
                    $this->image=imagecreatefromgif($this->resource);                               
                break;
            }             

            return (!empty($this->image))?$this->image:false;

     }
     
     public function setthumbName($name)
     {
         $this->thumbName=$name;
         
         return $this;
     }
     
    public function save($dest=null)
    {


        $src_image=getimagesize($this->resource);
        $this->path=(is_null($dest))?$this->path:$dest;
        $this->thumbName=(!$this->thumbName)?md5(time()."_".$this->imageName):$this->thumbName;
        $this->checkfilter();
        switch ($src_image['mime'])
        {
            case 'image/jpeg';
                imagejpeg($this->image,$this->path.$this->thumbName.".".$this->imageExt,80);
            break;

            case 'image/png';
                imagepng($this->image,$this->path.$this->thumbName.".".$this->imageExt,8);
            break;

            case 'image/gif';
                imagegif($this->image,$this->path.$this->thumbName.".".$this->imageExt,80);
            break;
        }
    }
    
    public function checkfilter()
    {
        
          if(count($this->filter)>0)
            {
                foreach ($this->filter as $key)
                {
                    $this->{$key}();
                }
            }
    }
     
     public function destroy($image1,$image2)
     {
          @imagedestroy($image1);
          @imagedestroy($image2);
     }
}

?>
