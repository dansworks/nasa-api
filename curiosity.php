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

//curiosity cams
//FHAZ, RHAZ, MAST, CHEMCAM, MAHLI, MARDI, NAVCAM

var sol= 1446;
var numPhotos;
var dateobj= new Date() ;
var month = dateobj.getMonth()+1;
var day = dateobj.getDate();
var day_today= dateobj.getDate();
var year = dateobj.getFullYear();

$("#dateC").append(year+"-"+month+"-"+(day));
$("#sol").append(sol);
var url_curiosity ="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol="+sol+"&api_key="+api_key;
var url_c_earthdate="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+(day)+"&api_key="+api_key;
// var url_c_earthdate_1="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+day+"&api_key="+api_key;
// var url_c_earthdate_1="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+day+"&api_key="+api_key;

console.log(url_c_earthdate);
//callCuriosity(url_c_earthdate);
callCuriosity(url_curiosity);
var camera = 'MAST';
function callCuriosity(url) {
$.ajax({
  url: url,
  success: function(result){
    
    console.log(result.photos.length);
    var numPhotos = result.photos.length;
    console.log(result.photos);
    console.log(result);
    // console.log(result.photos[0].camera['name']);
    // console.log(result.photos[0].camera);
    //var img = result.photos[25].img_src;

   // console.log(img);
   // console.log(img.naturalHeight);

for(var i = 0; i<result.photos.length; i++) {
 // console.log(result.photos.length);

 // console.log(result.photos[i].img_src);
  if(result.photos[i].camera['name'] == camera) {

  

  $("#imgTxt").append('<img id="img_id_'+i+'">');
  $("#img_id_"+i+"").attr("src", result.photos[i].img_src); 

   var img = document.getElementById("img_id_"+i+""); 
  // var width = img.clientWidth;
  if(img.clientWidth > 600) {
    //console.log(img.clientWidth+' more than 600');
  } else {
    //console.log(img.clientWidth+' less than 600');
   // console

    $("#img_id_"+i+"").remove();
    //console.log("img_id_"+i+"");

    //$("#img_id_"+i+"").show();

  }
   


   //console.log('test');

  // console.log(width);
 // console.log(result.photos[i].img_src.height);
  //console.log($("#img_id_"+i+"").height);
  
  }


   }
// var img = document.getElementById('img_id_198'); 
// //or however you get a handle to the IMG
//   var width = img.clientWidth;
//   console.log(width);

$("#numPhotos").append(numPhotos);
}
});
}



});
</script>
<link href="css/a.css">
<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Example Curiosity. From NASA data</title>
<style>
.noDisplay {
  display: none;
}
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

  
 <div id="dateC"></div>
 <div id="sol"></div>
 <div id="numPhotos"></div>
  
 <div class="img-responsive" id="imgTxt"></div>
  <div class="img-responsive"  id="images">


</div>
 
  <br/>
 <!--  <b>Return Object:</b>
  <pre id="returnObject"></pre> -->
<br>
<div><a href="https://api.nasa.gov/">Thank you to NASA for their public API!</a>
  </div>

</div><br><br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</body>
</html>