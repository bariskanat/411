

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!-- Le styles -->
 
    

   

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>

      <div id="header">
          
          @yield("header")
          
      </div><!------- header -------------->

    <div class="container">

       @yield('content')

    </div> <!-- /container -->


    {{{HTML::style("css/main.css")}}}
    {{{HTML::script("js/jquery.js")}}}
    {{{HTML::script("js/underscore.js")}}}
    {{{HTML::script("js/backbone.js")}}}
    {{{HTML::script("js/main.js")}}}
    {{{HTML::script("js/models.js")}}}
    {{{HTML::script("js/collections.js")}}}
    {{{HTML::script("js/views.js")}}}
    {{{HTML::script("js/bb.js")}}}
    
  </body>
</html>













