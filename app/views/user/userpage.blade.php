@extends("master")

@section("header")

 {{{HTML::image("images/header.png")}}}
@stop

@section("content")

<?php

  var_dump($perm);
?>
<div class="userinfo">
    <h1>{{$user->username}}</h1>  
   @if($perm)
   
   {{{HTML::route('useredit', 'edit your profile', array('id' => $user->id))}}}
   {{{HTML::route('createpage', 'create a page ', array('id' => $user->id))}}}
   @endif
</div>





@stop

