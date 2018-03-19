<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   $.ajax({
    url: '{{URL::to('view')}}',
    type:'get',
    success: function(data)
    {

      $("#result").empty();
  $output="";
  $discover="";
for (i=0;i<data.title.length;i++){
  $title=data.title[i];
  $overview=data.overview[i];
  $date=data.date[i];
  $rating=data.rating[i];
  $image=data.image[i];
 
   $output="<div class="+"media"+">"+
          "<div class="+"media-left"+">"+
          "<img src="+$image+" class="+"media-object"+" style="+"width:200px"+">"+
          "</div>"+
          "<div class="+"media-body"+">"+
          "<h3 class="+"media-heading"+">"+$title+"<small><i>"+" "+$date+"</i></small>"+"</h3>"+
          "<h5>"+$overview+"</h5>"+
          "<br>"+
          "<div class="+"container"+">"+
          "<div class="+"progress"+">"+
          "<div class="+"progress-bar"+" role="+"progressbar"+" aria-valuenow="+"70"+" aria-valuemin="+"0"+ "aria-valuemax="+"100"+" style=width:"+$rating*10+"%"+">"+
          "User Rating  "+$rating*10+"%"
         "</div>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>";
          
      $discover=  "<div class="+"media"+">"+
          "<div class="+"media-left"+">"+
          "<img src="+data.disimage[i]+" class="+"media-object"+" style="+"width:200px"+">"+
          "</div>"+
          "<div class="+"media-body"+">"+
          "<h3 class="+"media-heading"+">"+data.distitle[i]+"<small><i>"+" "+data.disdate[i]+"</i></small>"+"</h3>"+
          "<h5>"+data.disoverview[i]+"</h5>"+
          "<br>"+
          "<div class="+"container"+">"+
          "<div class="+"progress"+">"+
          "<div class="+"progress-bar"+" role="+"progressbar"+" aria-valuenow="+"70"+" aria-valuemin="+"0"+ "aria-valuemax="+"100"+" style=width:"+data.disrating[i]*10+"%"+">"+
          "User Rating  "+data.disrating[i]*10+"%"
         "</div>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>";  
          
 $("#result").append($output);
 $("#result1").append($discover);
}
 $("#result1").hide();

console.log(data.disjson);
    }
  });
});
function myFunction() {
  $("#result").hide();
 $("#result1").show();
  $("#upcome").hide();
  $("#result2").hide();
};
function myFunction1() {
  $("#result").show();
 $("#result1").hide();
  $("#upcome").hide();
  $("#result2").hide();
};
</script>
</head>
<body>

<!-- <form class="example" >
  <input type="text" placeholder="Search.." name="search">
  <button id="search" type="submit" ><i class="fa fa-search"></i></button>
</form> -->
<div class="example">
<input class="example" type="text" placeholder="Search for the Movies.." id="search" name="search"></input>
<button class="example" id="button1" value="val1" name="but1">Search</button>
</div>


  <ul class="nav nav-tabs">
    <li class="active"><a  data-toggle="tab" href="#" onclick='myFunction1()'>Upcoming movies</a></li>
      <li ><a data-toggle="tab" href="#" onclick='myFunction()' id="discover">Dicover Movies</a></li>
      </ul>
<div class="tab-content">
<div id="result"> </div>
<div id="result1"> </div>
<h3 id="upcome"></h3>
<div id="result2"> </div>
</div>

<script type="text/javascript">
$('#button1').on('click',function(){
$value=$("#search").val() 
$value1="{{ csrf_token() }}";
$.ajax({
type : 'post',
url : '{{URL::to('search')}}',
data:{'search':$value,'_token':$value1},
success:function(data){
  $('#upcome').text("Search Result for "+$value);
  $("#result2").empty();
  $("#result2").show();
  $("#upcome").show();
  $("#result").hide();
  $("#result1").hide();
  $output="";
for (i=0;i<data.title.length;i++){
  $title=data.title[i];
  $overview=data.overview[i];
  $date=data.date[i];
  $rating=data.rating[i];
  $image=data.image[i];
 
   $output= "<div class="+"media"+">"+
          "<div class="+"media-left"+">"+
          "<img src="+$image+" class="+"media-object"+" style="+"width:200px"+">"+
          "</div>"+
          "<div class="+"media-body"+">"+
          "<h3 class="+"media-heading"+">"+$title+"<small><i>"+" "+$date+"</i></small>"+"</h3>"+
          "<h5>"+$overview+"</h5>"+
          "<br>"+
          "<div class="+"container"+">"+
          "<div class="+"progress"+">"+
          "<div class="+"progress-bar"+" role="+"progressbar"+" aria-valuenow="+"70"+" aria-valuemin="+"0"+ "aria-valuemax="+"100"+" style=width:"+$rating*10+"%"+">"+
          "User Rating  "+$rating*10+"%"
         "</div>"+
          "</div>"+
          "</div>"+
          "</div>"+
          "</div>";
          
          
 $("#result2").append($output);

}
// console.log(Object.keys(data).length)
// console.log(data);
// console.log(data.title);
// console.log(data.length);
// console.log(data.overview);
// console.log(data.date);
// console.log(data.json);
// console.log(data.image);
// }
}
});
})

</script>
</body>
</html>
