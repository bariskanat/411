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
                        <a href="<?php  echo URL::to("p/{$ph->id}")?>">
                            <img src="<?php echo $location.$ph->filename  ?>">
                        </a>
                    <?php endforeach; ?>
                </div><!---- albumimage ------->
            <?php  endif;?>
            
            
        </div><!------- bigimage -------->
    </div> <!-----  photosection ------->
    
    <div id="photocomment">
        
        
    </div> <!-------- photocomment ----------->

</div> <!------  mainphoto ---------->
@stop