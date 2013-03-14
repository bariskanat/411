@extends("master")

@section("content")

<h1>photo section</h1>


<img src="<?php echo $location."b_".$photo->filename ;?>">
@stop