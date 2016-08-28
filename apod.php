<?php 
// download images with nasa img api.
// downloand sounds with nasa 
//https://api.nasa.gov/api.html



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="api_key.js"></script>
<script src="js/main.js"></script>
<script>


var url = "https://api.nasa.gov/planetary/apod?date=2015-08-20&api_key="+api_key;

</script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <title>Example APOD call</title>
</head>
<body>
  <b>API URL:</b>
  <pre id="reqObject"></pre>
  
  
  <img id="apod_img_id" width="250px"/>
  
  <iframe id="apod_vid_id" type="text/html" width="640" height="385" frameborder="0"></iframe>
  <p id="copyright"></p>
  
  <h3 id="apod_title"></h3>
  <p id="apod_explaination"></p>
  <br/>
  <b>Return Object:</b>
  <pre id="returnObject"></pre>
</body>
</html>