<!DOCTYPE html>
<html>
    <head>
  <meta charset="UTF-8">
  <meta name="description" content="Art gallery">
  <meta name="keywords" content="Art,gallary">
  <meta name="author" content="mack morerwa">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <title>ArtExpress</title>
        <!---- bootstrap---->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{URL::to('css/materialize.min.css')}}"  media="screen,projection"/> 
      <link type="text/css" rel="stylesheet" href="{{URL::to('css/css.css')}}"  media="screen,projection"/> 
    </head>
    <body>
        @yield('content')
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="{{URL::to('js/materialize.min.js')}}"></script>  
       <script>
            $(".button-collapse").sideNav();
          //$('.collapsible').collapsible();
             $('.modal').modal();
             $('.dropdown-button').dropdown(//{
//      inDuration: 300,
//      outDuration: 225,
//      constrainWidth: false, // Does not change width of dropdown to that of the activator
//      hover: true, // Activate on hover
//      gutter: 0, // Spacing from edge
//      belowOrigin: false, // Displays dropdown below the button
//      alignment: 'left', // Displays dropdown with edge aligned to the left of button
//      stopPropagation: false // Stops event propagation
  //}
  );
      </script>
    </body>
</html>
