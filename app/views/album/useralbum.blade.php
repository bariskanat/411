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
<div id="userinfoedit">
<div id="usereditmenu">
    <ul>
        <li> {{{HTML::route('useredit', 'edit your profile', array('id' => $user->id))}}}</li>        
        <li> {{{HTML::route('userphoto', 'update your photo ', array('id' => $user->id))}}}</li>
        <li> {{{HTML::route('useralbum', 'create an album ', array('id' => $user->id))}}}</li>
    </ul>
</div>

  <div  id="useredit">
    
      
         
       <form enctype="multipart/form-data" method="POST" action="<?php echo $album->id; ?>" id="userphotoform">
    
        {{{Form::file("picture")}}}          
        <input type="submit" value="add a photo" id="photosubmit">
      
        
        <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
         {{{Form::close()}}}
      
      
            @foreach($photo as $p)
                <img src="<?php echo $location.$p->filename;?>" >
            @endforeach
      
  </div><!--------useredit-------------->
</div><!----------userinfoedit--------->
@stop

