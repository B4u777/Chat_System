$("#search button").click(function(){
    $("#search input").toggleClass("show");
    $("#search button").toggleClass("active");
    $("#search input").focus();
    if($("#search input").hasClass("active")){
        $("#search input").val() = "";
        $("#search input").removeClass("active");
      }
});

$("#search input").keyup(function(){
    var searchTerm = $("#search input").val();
    if(searchTerm != ""){
      $("#search input").addClass("active");
    }else{
      $("#search input").removeClass("active");
    }
    $.ajax({
      type: "post",
      url: "http://localhost/chat/bridge/search.php",
      data: "searchTerm=" + searchTerm,
      contentType:"application/x-www-form-urlencoded",
      processData: false,
      dataType: "json",
  
      success: function (data){
        $(".users-list").html(data);
  
      }
    })
});

setInterval(function(){
    $.ajax({
        type: "get",
        url: "http://localhost/chat/bridge/UserList.php",
        processData: false,
        dataType: "json",
        success: function (data){
          if(!$("#search input").hasClass("active")){
            $(".users-list").html(data);
          }
    
        }
    })
}, 500);



