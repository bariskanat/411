@extends("master")

@section("content")
<div clas="form">
<div class="registerarea">
    
@if(Session::has("message"))
    <p class="error message">{{Session::get("message")}}</p>
@endif 




{{{Form::open("login")}}}

<p>
    {{{Form::label("email","email address")}}}
    {{{Form::text("email",Input::old("email"))}}}    
    
</p>

<p>
    {{{Form::label("password","password")}}}
    {{{Form::password("password")}}}
 
</p>

    
<input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
{{{Form::submit("Login")}}}
{{{Form::close()}}}
</div><!-------login--------------->



<div class="signup">
    <p>You don't have account yet ?</p>
    {{{HTML::route("signup","signup")}}}
    
</div>
</div>





@stop