@extends("master")

@section("content")


<pre>
<?php 
    
?>
</pre>
<h1>photo section</h1>

<div id="mainphoto">
    <div id="photosection">
        
        <div id="uinfo">
            
            <img src="<?php echo $location.$user->picture; ?>">
            
            <span>{{{HTML::route('userpage', $user->username, array('user' => $user->username))}}}</span>
            
        </div> <!------- uinfo ------------>
        
         <div id="bigimage">
             
           
             
            <img src="<?php echo $location."b_".$photo->filename ;?>">
            
            
              <?php if(count($otherphoto)>0): ?>
            
                <div id="albumimage">
                    <span class="albumlink">{{{HTML::route('userpage', $photo->album->name, array('user' => $user->username))}}}</span><br/>
                    <?php foreach($otherphoto as $ph): ?>
                        <a href="<?php  echo URL::to("p/{$ph->id}")?>" class="albumlink">
                            <img src="<?php echo $location.$ph->filename  ?>">
                        </a>
                    <?php endforeach; ?>
                </div><!---- albumimage ------->
            <?php  endif;?>
            
            
        </div><!------- bigimage -------->
    </div> <!-----  photosection ------->
    
    <div id="otheralbums">
        
       <?php if (count($albums)>0): ?>
      
         <?php  foreach($albums as $album): ?>
                <div class="ialbums">
                    <h1><?php echo $album['name']; ?></h1>
                    <?php $files=explode(",",$album['file']); ?>
                   
                    
                        <?php  if(count($files)>0):?>
                    
                            <div class="albumphotos">
                                <?php for($x=0;$x<=5;$x++){?>
                                    <div>
                                        <?php if(isset($files[$x]) && !is_null($files[$x])): ?>
                                            <img src="<?php echo $location.$files[$x]; ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php  } ?>
                            </div>
                    
                        <?php endif; ?>
                    </div>
         <?php endforeach; ?>
        
        <?php endif;?>
       
    </div> <!-------- otheralbums ----------->

</div> <!------  mainphoto ---------->
@stop