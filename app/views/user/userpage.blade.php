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
        <li> {{{HTML::route('userphoto', 'update your photo ', array('id' => $user->id))}}}</li>


    </ul>
 @endif
@stop

@section("content")



 <br/>
  




@stop

