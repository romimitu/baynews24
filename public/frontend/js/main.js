$(document).ready(function(){$.get("/dynamics/mostshared").done(function(response){$('#most_shared').html(response);});getMostRead(function(response){$('#most_read_watched').html(response);})
$('#btn_most_watched').click(function(){getMostWatched(function(response){$('#most_read_watched').html(response);})});$('#btn_most_read').click(function(){getMostRead(function(response){$('#most_read_watched').html(response);})});getSubCateGoryList();});function getMostRead(callback){$.ajax({method:"GET",url:"/dynamics/mostread",cache:false,success:function(response){callback(response);}});}
function getMostWatched(callback){$.ajax({method:"GET",url:"/dynamics/mostwatched",cache:false,success:function(response){callback(response);}});}
function getSubCateGoryList(){if(('#sub_cat_listing').length>0){var value=$('#sub_cat_listing').attr('value');$("#sub_cat_listing").load("/dynamics/subcatlist/"+value);}}