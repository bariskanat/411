@extends("master")

@section("content")

<h1>photo section</h1>

<div id="mainphoto">
    <div id="photosection">
        
        <div id="uinfo">
            
            <img src="<?php echo $location.$user->picture; ?>">
            
            <span>{{{HTML::route('userpage', $user->username, array('user' => $user->username))}}}</span>
            
        </div>
        
        <img src="<?php echo $location."b_".$photo->filename ;?>">
    </div>
    
    <div id="photocomment">
        
        
    </div>

</div>
@stop