@extends("master")


@section("content")



<div class="registerarea">
<h1>hello</h1>

{{{Form::open()}}}

    <p>
    {{{Form::label("username","username")}}}
    {{{Form::text("username",Input::old("username"))}}}
    
    @if($errors->has("username"))
        {{{$errors->first("username","<span class='errors'>:message</span>")}}}
    @endif
    
</p>

<p>
    {{{Form::label("email","email address")}}}
    {{{Form::text("email",Input::old("email"))}}}
    
    @if($errors->has("email"))
        {{{$errors->first("email","<span class='errors'>:message</span>")}}}
    @endif
    
</p>

<p>
    {{{Form::label("password","password")}}}
    {{{Form::password("password")}}}
    
    
    @if($errors->has("password"))
        {{{$errors->first("password","<span class='errors'>:message</span>")}}}
    @endif
    
</p>


<p>
    
    
    {{{Form::label("password_confirmation","password confirm")}}}
    {{{Form::password("password_confirmation")}}}
    
    @if($errors->has("password_confirmation"))
        {{{$errors->first("password_confirmation","<span class='errors'>:message</span>")}}}
    @endif
    
</p>
    
<input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
{{{Form::submit("create account")}}}
{{{Form::close()}}}
</div>


<div class="signup">
    <p>Already Have an Account?</p>
    {{{HTML::route("login","login")}}}
    
</div>

@stop