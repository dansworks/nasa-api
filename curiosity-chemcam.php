<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="
Mars Rover Curiosity CHEMCAM images. Courtesy of NASA API. 
">
<meta name="description" content="
Ongoing project and research by Daniel Ochoa using NASA's API. Images
from the CHEMCAM on Mars Rover Curiosity.  
">
<meta name="robots" content="index, follow">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="js/api_key.js"></script>

<script></script>
<script>
$(document).ready(function() {
// download images with nasa img api.
//https://api.nasa.gov/api.html
//curiosity cams
//FHAZ, RHAZ, MAST, CHEMCAM, MAHLI, MARDI, NAVCAM

var sol= 1446;
var numPhotos;
var dateobj= new Date() ;
var month = dateobj.getMonth()+1;
var day = dateobj.getDate();
var day_today= dateobj.getDate()-5;
var year = dateobj.getFullYear();

//$("#dateC").append(year+"-"+month+"-"+(day));

var url_curiosity ="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol="+sol+"&api_key="+api_key;
//var url_c_earthdate="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+day+"&api_key="+api_key;
// var url_c_earthdate_1="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+day+"&api_key="+api_key;
// var url_c_earthdate_1="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+day+"&api_key="+api_key;

//console.log(url_c_earthdate);
//callCuriosity(url_c_earthdate);
callCuriosity(url_curiosity);

function callCuriosity(url) {
$.ajax({
  url: url,
  success: function(result){
    console.log(result.photos.length);
    var numPhotos = result.photos.length;
    //console.log(result.photos);
    console.log(result.photos[0].camera['name']);
    // console.log(result.photos[0].camera);
    // console.log(result.photos[1].camera['name']);

for(var i = 0; i<result.photos.length; i++) {
 // console.log(result.photos.length);

 // console.log(result.photos[i].img_src);
  if(result.photos[i].camera['name'] == 'CHEMCAM') {

  $("#imgTxt").append('<img class="image" id="img_id_'+i+'" height="300">');
  $("#img_id_"+i+"").attr("src", result.photos[i].img_src); 
  
  
  } 


   }

if($(".image").length > 0){ console.log('yes');} else {
  $("#imgTxt").html('No CHEMCAM images found. Try another sol.');
}
//$("#numPhotos").html(numPhotos);
}
});
}

$('#next').on('click', function() {
  if(sol < 1488) {
   sol++ ;
   console.log(sol);
   $("#sol").html(sol);
   $("#imgTxt").empty(); 
//url_c_earthdate="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+(day)+"&api_key="+api_key;  
url_curiosity ="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol="+sol+"&api_key="+api_key;
  console.log(url_curiosity);
  callCuriosity(url_curiosity);
    }else {console.log('not more than '+day_today);}

  });

   $('#back').on('click', function() {
  if(sol >1) {
 sol-- ;
   console.log(sol);
   $("#sol").html(sol);
    $("#imgTxt").empty(); 
//url_c_earthdate="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+(day)+"&api_key="+api_key;   
 url_curiosity ="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol="+sol+"&api_key="+api_key; 
     console.log(url_curiosity);

   callCuriosity(url_curiosity);
  }else{ console.log('not less than 1');}
  

 });

$("#sol").html(sol);

});
</script>
<link href="css/a.css">
<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Images by Sol from Mars Rover Curiotisy's CHEMCAM. From NASA API data</title>
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
    <div class="row">
      <div class="col-xs-12">
    <span id="back" class="glyphicon glyphicon-chevron-left"></span>
    <span id="play" class="glyphicon glyphicon-play-circle"></span>
    <span id="next" class="glyphicon glyphicon-chevron-right"></span>
   </div>
 </div>

  
 <div id="dateC"></div>
 <span>Sol </span><span id="sol"></span>
 <div id="numPhotos"></div>
  
 <div class="img-responsive" id="imgTxt"></div>
  <div class="img-responsive"  id="images">


</div>
 
  <br/>
 <!--  <b>Return Object:</b>
  <pre id="returnObject"></pre> -->
<br>
<div><a href="https://api.nasa.gov/">
  Images by Sol from Mars Rover Curiotisy's CHEMCAM.
  Thank you to NASA for their public API!</a>
  </div>

</div><br><br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</body>
</html>