<?php 
require_once("../../config_ocho_lab/lib/initialize.php");

$sql_mars_txt = "SELECT * FROM mars_land_txt";
$result_set = $database->query($sql_mars_txt);
$num_rows = $result_set->num_rows;
echo '<br>';
//echo $num_rows;
$txt = [];
$article_1 = [];
$article_2= [];
$emotion = [];
$thing = [];
$action = [];
$descriptive = [];
$time = [];

//$result_set = get_object_vars($result_set);

 while ($obj = $result_set->fetch_object()) {

  //push each result into another array that will be final outp.
 // $rand_id = rand(1, $num_rows);
 array_push($article_1, $obj->article_1);
 array_push($article_2, $obj->article_2);
 array_push($emotion, $obj->emotion);
 array_push($thing, $obj->thing);
 array_push($action, $obj->action);
 array_push($descriptive, $obj->descriptive);
 array_push($time, $obj->time);

 // $outp .= '<span class="txt">'.$obj->thing.' '.$obj->emotion.'</span>';
 

   
   } 
// print_r($thing);
// print_r($emotion);
// $thing_a = shuffle($thing);
// $emotion_a = shuffle($emotion);
// print_r(shuffle($emotion));
   //print_r($emotion[rand(0,$num_rows)]);
$txt_new = $article_1[rand(0,$num_rows)].' '.$emotion[rand(0,$num_rows)].' '.$thing[rand(0,$num_rows)].' '.$action[rand(0,$num_rows)];
?>
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
//use google ml for images through json responses to dictate what 
//language txt is responded back. 
function shuffle(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
    return a;
}
$(document).ready(function() {

  $('#about').on('click', function() {
    $('.about').show();
    });
// download images with nasa img api.
//https://api.nasa.gov/api.html
//curiosity cams
//FHAZ, RHAZ, MAST, CHEMCAM, MAHLI, MARDI, NAVCAM

var sol= 1438;
var numPhotos;
var dateobj= new Date() ;
var month = dateobj.getMonth()+1;
var day = dateobj.getDate();
var day_today= dateobj.getDate()-5;
var year = dateobj.getFullYear();

//$("#dateC").append(year+"-"+month+"-"+(day));

//var url_curiosity ="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol="+sol+"&api_key="+api_key;
var url_curiosity ='http://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol='+sol+'&page=2&api_key='+api_key;
//var url_c_earthdate="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+day+"&api_key="+api_key;
// var url_c_earthdate_1="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+day+"&api_key="+api_key;
// var url_c_earthdate_1="https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date="+year+"-"+month+"-"+day+"&api_key="+api_key;

//console.log(url_c_earthdate);
//callCuriosity(url_c_earthdate);
$('#imgTxt').on('click', function() { 
  callCuriosity(url_curiosity);
  });

function callCuriosity(url) {
$.ajax({
  url: url,
  success: function(result){
   // console.log(result.photos.length);
    var numPhotos = result.photos.length;
   // console.log(result.photos);
    //console.log(result.photos[0].camera['name']);
    // console.log(result.photos[0].camera);
    // console.log(result.photos[1].camera['name']);
var randChooseImg = [];
for(var i = 0; i<result.photos.length; i++) {
 // console.log(result.photos.length);

 // console.log(result.photos[i].img_src);
  if(result.photos[i].camera['name'] == 'MAST') {

  $("#imgTxt").append('<img class="image image-responsive" id="img_id_'+i+'">');
  $("#img_id_"+i+"").attr("src", result.photos[i].img_src); 
  //console.log(result.photos[i].img_src.replace("http", "https"));
  var img = document.getElementById("img_id_"+i+""); 
  // var width = img.clientWidth;
  if(img.clientWidth > 400) {
    //console.log(img.clientWidth+' more than 600');

    //console.log(result.photos[i].indexOf());
   // console.log(i);
    randChooseImg.push(i);
    //take each one of these images put into array
    //remove all but one.

  } else {
    //console.log(img.clientWidth+' less than 600');
   // console

    $("#img_id_"+i+"").remove();
    //console.log("img_id_"+i+"");

    //$("#img_id_"+i+"").show();

  }
   
  
  } 


   }
   //console.log(shuffle(randChooseImg));
   var marsImage = shuffle(randChooseImg);
   //console.log(marsImage[0]);
   for(var h = 1; h<marsImage.length; h++) { 
    //console.log(marsImage[h]);
    $("#img_id_"+marsImage[h]+"").remove();
    console.log("img_id_"+h+"");
    console.log(h);

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



});
</script>
<link href="css/a.css">
<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Project Mars Land by Artist Daniel Ochoa</title>
<style>
span.glyphicon {
    font-size: 30px;
    opacity: .5; 

}
span.glyphicon-play-circle {
    margin: 30px;
    z-index: 3;
}
.txt {
  /*font-size: 50%;*/
  font-size: 10em;
  font-size: 9vw;
  font-weight: thin;
  position: absolute;
  top: 0;
  bottom: 0;
  color:white;
  
  z-index: 3;
  
  /*border: 1px solid black;*/
  /*margin-bottom: -100px;*/
/*  text-align: center;*/
  vertical-align: middle;
}
.placeImg {
  position: absolute;
  top: 0;
  bottom: 0;
/*margin-bottom: -300;*/
/*z-index: 0;*/
}
.about {
  display:none;
  background-color:white;
  position: fixed;
  height: 450px;
  max-width: 70%;
  left: 50px;
  bottom: 0;
  padding: 10px;
/*margin-bottom: -300;*/
z-index: 3;
}
#about{
  position: fixed;
  background-color:white;
  height: 50px;
  width: 100%;
  bottom: 0;
  font: 14px;
  z-index: 3;

}
.m{
  margin: 10px;
}
</style>
</head>
<body>
  <div class="">
 
<?php 

?>
 <div class="txt img-responsive" id="imgTxt">
<span class="txt m">
<?php
//echo $outp;
//echo $txt_new;
echo $article_2[rand(1,$num_rows)].' '.$noun[rand(1,$num_rows)].''.$color[rand(1,$num_rows)].' '.$article_1[rand(1,$num_rows)].' '.$time[rand(1,$num_rows)].' '.$descriptive[rand(1,$num_rows)].' '.$thing[rand(1,$num_rows)];
//echo rand(1,$num_rows);
//echo $num_rows;
?></span>
 </div><br><br>
  <div class="img-responsive placeImg"  id="images">
    <img src="http://mars.jpl.nasa.gov/msl-raw-images/msss/01438/mcam/1438MR0071100380702791E01_DXXX.jpg" alt="Mars rover curiosity image from MAST camera">

</div>
 
  <br/>
 <!--  <b>Return Object:</b>
  <pre id="returnObject"></pre> -->
<br>
<div id="about"><span class="m">about</span><br>
<div class="about"><a href="https://api.nasa.gov/">
  <h1>Mars Land by Artist Daniel Ochoa</h1>
  This project uses programming languages javascript and php to 
  access NASA's API and randomized text is outputed over the image. 
  An ajax call to the API returns JSON formated data and is sorted to pull 
  images over 500 pixels in hight from the MAST camera on Mars Rover Curiosity. 
  The text over the image is a result of programatically randomizing a database of 
  words entered by the artist. Words are in columns of various categories such as 
  emotion, color, adjective, noun and time. </a>
  </div>
</div>


</div><br><br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</body>
</html>