<?php 
// download images with nasa img api.
// downloand sounds with nasa 
//https://api.nasa.gov/api.html



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="js/api_key.js"></script>

<script>var url ="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=2016-8-29&camera=MAST&api_key="+api_key;</script>
<script>
$.ajax({
  url: url,
  success: function(result){
   console.log(result);
   console.log(result.photos[0]);
   console.log(result.photos[0].img_src);
   // console.log("photos" in resutl {}
 
    $("#img_id").attr("src", result.photos[0].img_src);
    $("#img_id_1").attr("src", result.photos[1].img_src);
  

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
   
  }
  $("#reqObject").text(url);
  $("#returnObject").text(JSON.stringify(result, null, 4));  
  $("#apod_explaination").text(result.explanation);
  $("#apod_title").text(result.title);
}
});


</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Latest compiled and minified CSS -->

<link href="css/a.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Example APOD call. From NASA data</title>
<style>
span.glyphicon {
    font-size: 30px;
    opacity: .5; 

}
span.glyphicon-play-circle {
    margin: 30px;
    z-index: 3;
}

</style>
</head>
<body>
  <div class="container">
  <!--   <div class="row">
      <div class="col-xs-12">
    <span id="back" class="glyphicon glyphicon-chevron-left"></span>
    <span id="play" class="glyphicon glyphicon-play-circle"></span>
    <span id="next" class="glyphicon glyphicon-chevron-right"></span>
   </div>
 </div> -->
    <br>
 <!--  <b>API URL:</b> -->
 <!--  <pre id="reqObject"></pre> -->
  
  
  <img class="img-responsive" id="img_id" alt="NASA api APOD Call"/>
   
  <img class="img-responsive" id="img_id_1" alt="NASA api APOD Call"/>
  


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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</body>
</html>