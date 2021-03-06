<?php

class AllQuery
{
    
    public static function getuseralbum()
    {
        return "SELECT `albums`.`id`,`albums`.`name` 
                FROM `albums`                 
                WHERE `albums`.`user_id` = ?
                AND `albums`.`id` != ? 
                ORDER BY `albums`.`id` DESC
                LIMIT 5";  
                  
    }
    
    public static function getuserallalbums()
    {
        return "SELECT `albums`.`id`,`albums`.`name` 
                FROM `albums`                 
                WHERE `albums`.`user_id` = ?                
                ORDER BY `albums`.`id` DESC
               ";  
    }
    
    public static function getalbumphotos($result)
    {
        return   "SELECT group_concat(`photos`.`filename`) as `file` ,`albums`.`id`                 
                  FROM `photos` 
                  LEFT JOIN `albums` ON (`albums`.`id`=`photos`.`album_id`)
                  WHERE `albums`.`user_id` = ?
                  AND  `photos`.`album_id` in (".self::builquestionmark($result).")
                  GROUP BY `albums`.`id`";
    }
    
    public static function getphotolikes()
    {
        return "SELECT `likes`.`id`,`likes`.`content_id` ,`likes`.`external_id` as `userid`,`users`.`username`,`users`.`firstname`,`users`.`lastname`, `users`.`picture`
                FROM `likes`
                INNER JOIN `users` ON (`likes`.`external_id`=`users`.`id`)
                WHERE `likes`.`content_id` = ? and `likes`.`type` = 1 
                ORDER BY `likes`.`id` desc
                LIMIT 20";
    }
    
    
    private static function builquestionmark($result)
    {
        $arr=[];
        foreach($result as $t)
        {
            $arr[]=$t->id;
        }
        
        return implode(",",array_map(function(){
            return "?";
        },$arr));
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
