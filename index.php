<?php 
// download images with nasa img api.
// downloand sounds with nasa 
//https://api.nasa.gov/api.html



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="js/api_key.js"></script>

<script src="js/main.js"></script>
<script>


</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/a.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Example APOD call. From NASA data</title>
<style>
span.glyphicon {
    font-size: 35px;
    opacity: .5; 

}

</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
    <span id="back" class="glyphicon glyphicon-chevron-left"></span>
    <span class="glyphicon glyphicon-play-circle"></span>
    <span id="next" class="glyphicon glyphicon-chevron-right"></span>
   </div>
 </div>
    <br>
 <!--  <b>API URL:</b> -->
 <!--  <pre id="reqObject"></pre> -->
  
  
  <img class="img-responsive" id="apod_img_id" alt="NASA api APOD Call"/>
 
  <div id="apod_vid_id" type="text/html" ></div>
  <p id="copyright"></p>
  
  <h3 id="apod_title"></h3>
  <p id="apod_explaination"></p>
  <br/>
 <!--  <b>Return Object:</b>
  <pre id="returnObject"></pre> -->
<br>
<div><a href="https://api.nasa.gov/">Thank you to NASA for their public API!</a>
  </div>

</div><br><br>
</body>
</html>