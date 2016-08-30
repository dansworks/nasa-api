 
$(document).ready(function() {


var dateobj= new Date() ;
var month = dateobj.getMonth()+1;
var day = dateobj.getDate();
var day_today= dateobj.getDate();
var year = dateobj.getFullYear();
var url = "https://api.nasa.gov/planetary/apod?date="+year+"-"+month+"-"+day+"&api_key="+api_key;
callnew(url);
//var date_ent = year+'-'+month+'-'+day;

 $('#next').on('click', function() {
  if(day < day_today) {
   day++ ;
   console.log(day);
  url = "https://api.nasa.gov/planetary/apod?date="+year+"-"+month+"-"+day+"&api_key="+api_key;
  
  console.log(url);
  callnew(url);
    }else {console.log('not more than '+day_today);}

  });
 $('#back').on('click', function() {
  if(day >1) {
 day-- ;
   console.log(day);
   
   url = "https://api.nasa.gov/planetary/apod?date="+year+"-"+month+"-"+day+"&api_key="+api_key;
   console.log(url);

   callnew(url);
  }else{ console.log('not less than 1');}
  

 });



function callnew(url) {

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

}

});//end document ready function jquery