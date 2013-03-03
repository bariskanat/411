<?php

class Image{
    
    private $resource;
    private $image;
    private $thumbX=200;
    private $thumbY=200;
    private $thumbName;   
    private $thumbExt;
    private $size=4194304;
    private $imageX;
    private $imageY;
    private $imageName;
    private $imageExt;
    private $imagesize;
    private $allowed=["jpeg","jpg","gif","png"];
    private $path;
    private $attributes=["thumbX","thumbY","thumbExt","thumbName","size","path"];
    
    public function __construct($image,$info=null)
    {
        $this->imagepath();       
        $this->resource=(is_array($image))?$image['tmp_name']:$image;
        $this->getimageinfo($image);
        $this->createimage();
        if(!is_null($info))
        $this->setattributes($info);
    }
    
    public function imagepath()
    {
        $this->path=dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR."public/images/";
    }
    
    
    public function getimageinfo($image)
    {
        $filext=(is_array($image))?pathinfo($image['name'])["extension"]:pathinfo($image)["extension"];
                  
           if($this->allowed(strtolower($filext)))          
               $this->setimagevalue($image);
           
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
                
                $this->{$key}=$val;
            }
        }
    }
    
    
    public static function open($image,$info=null)
    {    
        return new static($image,$info);
    }
    
    private function getImageName()
    {
        return $this->imageName;
    }
    
    public function getImageExt()
    {
        return $this->imageExt;
    }
    
     public function getThumbName()
     {
         return $this->thumbName;
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
            
            $this->thumbX=(!$width)?$this->thumbX:$width;
            $this->thumbY=(!$height)?$this->thumbY:$height;
            $this->scale();
            $thumb=imagecreatetruecolor($this->thumbX,$this->thumbY);  
            return $this->_resize($thumb,0,0,0,0,$this->thumbX,$this->thumbY,$this->imageX, $this->imageY,$dest);   
                
     }
    
    public function crop(){
        
    }
     private function _resize($thumb,$x,$y,$picture_x,$picture_y,$thumb_width=null,$thumb_height=null , $picture_width=null, $picture_height=null,$dest=null)
     {
            $img=$this->createimage();
            imagecopyresampled($thumb, $img, $x, $y,$picture_x,$picture_y,$thumb_width,$thumb_height , $picture_width, $picture_height);                    
            $this->image=$thumb;
            $this->save($dest);        

            $this->destroy($thumb,$img);
           
            return new self($this->path.$this->thumbName.".".$this->imageExt);       


     }
     
     
     public function gray()
     {
         imagefilter($this->image, IMG_FILTER_GRAYSCALE);
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
     
    public function save($dest=null)
    {


        $src_image=getimagesize($this->resource);
         $this->path=(is_null($dest))?$this->path:$dest;
        $this->thumbName=(!$this->thumbName)?md5(time()."_".$this->imageName):$this->thumbName;
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
     
     public function destroy($image1,$image2)
     {
          @imagedestroy($image1);
          @imagedestroy($image2);
     }
}

?>
