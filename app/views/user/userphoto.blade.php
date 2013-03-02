@extends("master")

@section("header")

 {{{HTML::image("images/header.png")}}}
 
@stop


@section("content")

 
  <div class="registerarea" id="useredit">
    
      <form enctype="multipart/form-data" method="POST" action="<?php echo $user->id; ?>">
    
    {{{Form::file("picture")}}}
    {{{Form::submit("upload your photo")}}}
    <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
    {{{Form::close()}}}
  </div>
@stop

