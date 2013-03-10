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
        <li> {{{HTML::route('useralbum', 'update your photo ', array('id' => $user->id))}}}</li>
    </ul>
</div>

  <div  id="useredit">

  <script type="text/template" id="useredittemplate">
      <form id="usereditform">
          <ul>
              <li>
                <label for="firstname">firsttname</label>
                <input type="text" value="<%= firstname %>" id="firstname">
              </li>

            <li>
                <label for="lastname">lasttname</label>
                <input type="text" value="<%= lastname %>" id="lastname">
            </li>

            <li>
                <label for="about" class="textarealabel">about</label>
                <textarea  id="about" name="about"><%= about %></textarea>

            </li>
            <li>
                <input type="submit" value="update your info" id="editsubmit">
            </li>
          </ul>
        </form>
  


</script>
  </div><!--------useredit-------------->
</div><!----------userinfoedit--------->
@stop
