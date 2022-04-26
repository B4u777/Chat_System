$(".input-field").focus(function(){
$(".input-field").keyup(function(){
    if($(this) != ""){
        $("button").addClass("active");
    }else{
        $("button").removeClass("active");
    }
});
});




$(".typing-area").submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: "post",
        url: "http://localhost/chat/bridge/insert-chat.php",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (data) {

            if(data=="success"){
               $(".input-field").val('');
               scrollToBottom();
            }
        }
    })



});


$(".chat-box").mouseenter(function(){
    $(".chat-box").addClass("active");

})


$(".chat-box").mouseleave(function(){
    $(".chat-box").removeClass("active");

})

setInterval(function(){

   var  incoming_id =+ $(".incoming_id").val();
    $.ajax({
        type: "post",
        url: "http://localhost/chat/bridge/get-chat.php",
        data: "incoming_id="+incoming_id,
        contentType:"application/x-www-form-urlencoded",
        processData: false,
        dataType: "json",

        success: function (data) {

            if(data){
              $(".chat-box").html(data);
              if(!$(".chat-box").hasClass("active")){
                scrollToBottom();
              }
            }
        }
    })
}, 500);

function scrollToBottom(){
   $(".chat-box")[0].scrollTop = $(".chat-box")[0].scrollHeight;
  }
  






