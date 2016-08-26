<?php 
// download images with nasa img api.
// downloand sounds with nasa 
//https://api.nasa.gov/api.html



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="api_key.js"></script>
<script>



var lon = 40.7829;
var lat = 73.9654;
var date_of = '';
//var url = "https://api.nasa.gov/planetary/earths/imagery?lon="+lon+"&lat="+lat+"&date=2016-02-01&cloud_score=True&api_key="+api_key;
var url = 'https://api.nasa.gov/planetary/earth/imagery?lon=90&lat=60&date=2014-02-01&cloud_score=True&api_key=rttgMgMYHMo4txZIF4LLKxYSa9YLIE2NvtFjLwSj';
console.log(url);

for(var i =0; i <100; i++) {

}

// then get url 
//https://api.nasa.gov/planetary/earth/imagery?lon=100.75&lat=1.5&date=2014-02-01&cloud_score=True&api_key=DEMO_KEY
$('#test').append(url);


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

</script>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <title>Example APOD call</title>
</head>
<body>
  <div id="test">chheze</div>
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