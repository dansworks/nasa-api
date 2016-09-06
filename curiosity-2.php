<?php 
// download images with nasa img api.
// downloand sounds with nasa 
//https://api.nasa.gov/api.html

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Latest compiled and minified CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="js/api_key.js"></script>

<script></script>
<script>
$(document).ready(function() {

var sol= 1446;

var url_curiosity ="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol="+sol+"&api_key="+api_key;
callCuriosity(url_curiosity);
function callCuriosity(url) {
$.ajax({
  url: url,
  success: function(result){

   console.log(result);
   console.log(result.photos[0]);
   console.log(result.photos[0].img_src);
   // console.log("photos" in resutl {}
  //var img_a_0 = result.photos[0].img_src.replace(/^http:\/\//i, 'https://');
 console.log(url);
   // $("#img_id").attr("src", img_a);
   // for(var i = 0; i<4; i++) {
   //  $("#img_id_"+i+).attr("src", result.photos[i].img_src);
for(var i = 0; i<25; i++) {

  $("#images").append('<img src="'+result.photos[i].img_src+'" class="img-responsive" id="img_id'+i+'" alt="NASA curiosity '+i+'"/><br>');

   }
}
});
}


//$("#img_id_"+i+).attr("src", result.photos[i].img_src)
});
</script>
<link href="css/a.css">
<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Example Curiosity. From NASA data</title>
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
  <div id="images">
  <?php 

  // for($j = 0; $j <25; $j++) {
  //   echo '<img class="img-responsive" id="img_id_'.$j.'" alt="NASA curiosity '.$j.'"/><br>';
  // }


  ?>
</div>



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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</body>
</html>