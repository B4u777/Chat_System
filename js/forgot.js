
$(".error-text").hide();



$("#formId").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
      
    $.ajax({
        type: "post",
        url: "forgot_password.php",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (data) {



            if (data.status) {
                swal({
                    title: data.title,
                    text: data.message,
                    type: "success"
                }, function () {

                    window.open('create_password.php');


                });


            }
            else {
                $(".error-text").show();
                $(".error-text").html(data);


            }
        }


    })

});






