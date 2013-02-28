@extends("master")

@section("header")

 {{{HTML::image("images/header.png")}}}
 
@stop


@section("content")

 
  <div class="registerarea" id="useredit">

  <script type="text/template" id="useredittemplate">
      <form id="usereditform">
        <p>
            <label for="firstname">firsttname</label>
            <input type="text" value="<%= firstname %>" id="firstname">
        </p>
        <p>
            <label for="lastname">lasttname</label>
            <input type="text" value="<%= lastname %>" id="lastname">
        </p>
        <p>
            <label for="about">about</label>
            <textarea  id="about" name="about"><%= about %></textarea>
           
        </p>
        <input type="submit" value="update your info" id="editsubmit">
        </form>
  


</script>
  </div>
@stop
