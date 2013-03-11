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
      <ul>
       <form enctype="multipart/form-data" method="POST" action="<?php echo $user->id; ?>" id="userphotoform">
    
        {{{Form::file("picture")}}}
        <li>
                <label for="albumname">Album name</label>
                <input type="text"  name="albumname" id="albumname" value="<?php Input::old(); ?>">
              </li>

            <li>
                <label for="location">location</label>
                <input type="text" name="location" id="location">
            </li>

            <li>
                <label for="about" class="textarealabel">about</label>
                <textarea  id="about" name="about"></textarea>

            </li>
        <input type="submit" value="create an album" id="photosubmit">
        </ul>
        <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
    {{{Form::close()}}}

      
  </div><!--------useredit-------------->
</div><!----------userinfoedit--------->
@stop

