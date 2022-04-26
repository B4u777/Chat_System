$(".error-text").hide();
$("#formId").submit(function(e){
  e.preventDefault();
  var form=$(this);
  
  $.ajax({
      type: "post",
      url: "http://localhost/chat/bridge/login.php",
      data: form.serialize(),
     
      success:function(res){
          var dt= JSON.parse(res);

          if(dt=="success"){
              window.open('home.php','_self');
          }
          else{
             $(".error-text").show();
                $(".error-text").html(dt);
                $(".error-text").fadeOut(6000);
          }
      }
  
     
})

});






