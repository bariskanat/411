@extends("master")


@section("content")


<div id="userregister">
    
<form method="POST" action="user">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="password" name="confirm_password">
    <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
    <input type="submit" value="create">
    
</form>

    
    
    
</div><!--------userregister------------------->





@stop