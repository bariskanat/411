@extends("master")

@section("header")

 {{{HTML::image("images/header.png")}}}
 
 <h1>{{$user->fullname($user->id)}}</h1>
 
 <?php  if($user->getuserimage($user->id)):?>
    <img src="<?php echo path()."/images/".$user->username."/".$user->picture;?>" id="userimage">
 <?php endif; ?>
    
  @if($user->permission($user->username))   
    <ul class="userinfo">

         

        <li> {{{HTML::route('useredit', 'edit your profile', array('id' => $user->id))}}}</li>
        <li>  {{{HTML::route('createpage', 'create a page ', array('id' => $user->id))}}}</li>
        


    </ul>
 @endif  
    
 
@stop

@section("content")
<div id="allalbums">
   <?php if (count($albums)>0): ?>
      
         <?php  foreach($albums as $album): ?>
                <div class="ialbumss">
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
</div>
@stop
