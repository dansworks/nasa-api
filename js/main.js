 
$(document).ready(function() {

// $.getJSON('emilio_84_artist_json.php', function(data) {
//   var position = 0;
//   var slider_artwork = data[0][position];
//   //console.log(slider_artwork);
 
//   var num_artworks = data[0].length-1;
//   function change_art(num) {
//     position = position + num;
//     if (position > num_artworks) {
//       position = 0;
//     }
//     if (position < 0) {
//       position = num_artworks;
//     }

//     console.log(position);
//     var art =data[0][position];
//     var a= '';
//     var b= '';

//      //a += '<a href="https://ocholab.com/artwork/'+art.artwork_id+'" ';
//     a += '<a href="https://ocholab.com/artwork/'+art.artwork_id+'">';
//     a += '<img class="img-responsive" src="';
//     a += art.img_path_web;
//     a += '"alt="'+art.artwork_media+' by Artist '+art.first_name+' '+art.last_name+'"></a> ';

//     b += art.artwork_title+', '+art.artwork_media+', '+art.artwork_height+' x '+art.artwork_width+' in. '+art.year;
//    // a += art.artwork_media;

  
//     //$('#test').html('place img<br>'+data[0][position]);

//     $('#artwork_slider').html(a);
//     $('#artwork_text').html(b);

//    // $('#test').html('place img<br>'+outp);
// }
// //console.log(slider_artwork);
//  $(window).load(function(){
//   change_art(1);
//  });
//  $('#next').on('click', function() {
//    change_art(1);
//    console.log('next hit');

//   });
//  $('#back').on('click', function() {
//    change_art(-1);
//    console.log('next hit');

//   });


// });









// var create_date = new Date();
// var a = create_date.format("YYYY-MM-DD");

// var now = new Date();
// var a = now.format("yyyy/mm/dd");
var dateobj= new Date() ;
var month = dateobj.getMonth()+1;
var day = dateobj.getDate();
var year = dateobj.getFullYear();
var url = "https://api.nasa.gov/planetary/apod?date="+year+"-"+month+"-"+day+"&api_key="+api_key;
callnew(url);
//var date_ent = year+'-'+month+'-'+day;

 $('#next').on('click', function() {
   day++ ;
   console.log(day);
  url = "https://api.nasa.gov/planetary/apod?date="+year+"-"+month+"-"+day+"&api_key="+api_key;
  
  console.log(url);
  callnew(url);
  });
 $('#back').on('click', function() {
   day-- ;
   console.log(day);
   url = "https://api.nasa.gov/planetary/apod?date="+year+"-"+month+"-"+day+"&api_key="+api_key;
   console.log(url);
   callnew(url);

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