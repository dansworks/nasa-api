<?php 
// download images with nasa img api.
// downloand sounds with nasa 
//https://api.nasa.gov/api.html
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script></script>
<script src="js/api_key.js"></script>
<script>
$(document).ready(function() {
var lon = 50;
var lat = 104;
var dateobj= new Date() ;
var month = dateobj.getMonth()+1;
var day = dateobj.getDate();
var day_today= dateobj.getDate();
var year = dateobj.getFullYear();
console.log 
$("#dateC").append(year+"-"+month+"-"+(day));
var url = 'https://api.nasa.gov/planetary/earth/imagery?lon='+lon+'&lat='+lat+'&date='+year+'-'+month+'-'+(day)+'&cloud_score=True&api_key='+api_key;

$('#lonOut').html(lon);

$('#latOut').html(lat);
console.log(url);


$.ajax({
  url: url,
  success: function(result){
  if("copyright" in result) {
    $("#copyright").text("Image Credits: " + result.copyright);
  }
  else {
    $("#copyright").text("Image Credits: " + "Public Domain");
  }
  
  if(result.media_type == "video") {
    $("#apod_img_id").css("display", "none"); 
    $("#apod_vid_id").attr("src", result.url);
  }
  else {
    $("#apod_vid_id").css("display", "none"); 
    $("#apod_img_id").attr("src", result.url);
  }
  $("#reqObject").text(url);
  $("#returnObject").text(JSON.stringify(result, null, 4));  
  $("#apod_explaination").text(result.explanation);
  $("#apod_title").text(result.title);
}
});

console.log(url);
});
</script>
<!-- <script src="js/main.js"></script> -->
<script>
console.log(api_key);


//var url = "https://api.nasa.gov/planetary/earths/imagery?lon="+lon+"&lat="+lat+"&date=2016-02-01&cloud_score=True&api_key="+api_key;

//console.log(url);

// for(var i =0; i <100; i++) {

// }

// then get url 
//https://api.nasa.gov/planetary/earth/imagery?lon=100.75&lat=1.5&date=2014-02-01&cloud_score=True&api_key=DEMO_KEY


</script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <title>Example APOD call</title>
</head>
<body class="container">
  <div id="dateC"></div>
<div> Lon
  <span id="back" class="glyphicon glyphicon-chevron-up"></span>
  <span id="next" class="glyphicon glyphicon-chevron-down"></span>
  <div id="lonOut"></div>
</div>

<div> Lon
  <span id="back" class="glyphicon glyphicon-chevron-up"></span>
  <span id="next" class="glyphicon glyphicon-chevron-down"></span>
  <div id="latOut"></div>
</div>
  <div id="test"></div>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</body>
</html>