@extends("master")

@section("header")

 {{{HTML::image("images/header.png")}}}
 
@stop


@section("content")

 
  <div class="registerarea" id="useredit">

  <script type="text/template" id="useredittemplate">
      <form id="usereditform">
        <p>
            
            <input type="text" value="<%= firstname %>" id="firstname">
        </p>
        <p>
            <label for="lastname">firstname</label>
            <input type="text" value="<%= lastname %>" id="lastname">
        </p>
        <p>
            <label for="about">firstname</label>
            <textarea  id="about"><%= about %></textarea>
           
        </p>
        <input type="submit" value="update your info" id="editsubmit">
        </form>
  


</script>
  </div>
@stop
