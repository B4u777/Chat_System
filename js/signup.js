
// displaying error starts


$("#name_error_message").hide();
$("#password_error_message").hide();
$("#email_error_message").hide();
$("#country_error_message").hide();
$("#state_error_message").hide();
$("#city_error_message").hide();
$("#gender_error_message").hide();
$("#forgotten_error_message").hide();
$("#profile_error_message").hide();
$("#policy_error_message").hide();


var error_name = false;
var error_pass = false;
var error_email = false;
var error_country = false;
var error_state = false;
var error_city = false;
var error_gender = false;
var error_forgot = false;
var error_profile = false;
var error_policy = false;


$("#user_name").keyup(function () {
  check_name();
});
$("#user_password").keyup(function () {
  check_pass();
});
$("#user_email").keyup(function () {
  check_email();
});
$("#user_country").focusout(function () {
  check_country();
});
$("#user_state").focusout(function () {
  check_state();
});
$("#user_city").focusout(function () {
  check_city();
});
$("#gender").focusout(function () {
  check_gender();
});
$("#forgotten").keyup(function () {
  check_forgot();
});
$("#user_profile").change(function () {
  check_profile();
});
$("#policy").focusout(function () {
  check_policy();
});




function check_name() {
  var pattern = /^[a-zA-Z]*$/;

  var fname = $("#user_name").val();
  if (pattern.test(fname) && fname !== '') {
    $("#name_error_message").hide();
    error_name = false;
  } else {
    $("#name_error_message").html("Should contain only Characters");
    $("#name_error_message").show();
    $("#name_error_message").css("color", "red");
    error_name = true;
  }
}

function check_pass() {
  var password_length = $("#user_password").val().length;
  if (password_length < 8) {
    $("#password_error_message").html("**Please Enter Password");
    $("#password_error_message").show();
    $("#password_error_message").css("color", "red");
    error_pass = true;
  } else {
    $("#password_error_message").hide();
    error_pass = false;
  }
}

function check_email() {

  var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var email = $("#user_email").val();
  if (pattern.test(email) && email !== '') {
    $("#email_error_message").hide();
    $("#user_email").css("border-bottom", "2px solid #34F458");
    error_email = false;
  }
  else {
    $("#email_error_message").html("Invalid Email");
    $("#email_error_message").show();
    $("#user_email").css("border-bottom", "2px solid #F90A0A");
    error_email = true;
  }
}

function check_country() {
  var country = $("#country").val();
  if (country !== '' && country !== "0") {
    $("#country_error_message").hide();
    error_country = false;

  } else {
    $("#country_error_message").html("**Please Select Country");
    $("#country_error_message").show();
    $("#country_error_message").css("color", "red");
    error_country = true;

  }
}

function check_state() {
  var state = $("#state").val();
  if (state !== '' && state !== "0") {
    $("#state_error_message").hide();
    error_state = false;

  } else {
    $("#state_error_message").html("**Please Select State");
    $("#state_error_message").show();
    $("#state_error_message").css("color", "red");
    error_state = true;

  }
}

function check_city() {
  var city = $("#city").val();
  if (city !== '' && city !== "0") {
    $("#city_error_message").hide();
    error_city = false;

  } else {
    $("#city_error_message").html("**Please Select City");
    $("#city_error_message").show();
    $("#city_error_message").css("color","red");
    error_city = true;

  }
}

function check_gender() {
  var cbox = [];
  var cbox = document.forms["myform"]["user_gender"];

  if (
    cbox[0].checked == false &&
    cbox[1].checked == false &&
    cbox[2].checked == false

  ) {
    $("#gender_error_message").html("**Please Select Gender");
    $("#gender_error_message").show();
    $("#gender_error_message").css("color","red");


    error_gender = true;
    return false;
  } else {
    $("#gender_error_message").hide();


    error_gender = false;

  }
}


function check_forgot() {
  var comment = $("#forgotten").val();
  if (comment !== '') {
    $("#forgotten_error_message").hide();
    error_forgot = false;
  } else {
    $("#forgotten_error_message").show();
    $("#forgotten_error_message").html("**Please Give Name");
    $("#forgotten_error_message").css("color", "red");
   
    error_forgot = true;

  }
}

function check_profile() {
  var filePath = $("#user_profile").val();
  // Allowing file type
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

  if (!allowedExtensions.exec(filePath) && filePath == '') {
    $("#profile_error_message").html("Please Select Correct File");
    $("#profile_error_message").show();
    $("#profile_error_message").css("color","red");

    error_profile = true;
  } else {
    $("#profile_error_message").hide();
    error_profile = false;
  }

}


function check_policy() {

  var box = document.forms["myform"]["policy"];

  if (box.checked == false) {
    $("#policy_error_message").html("**Please Check Policy");
    $("#policy_error_message").show();
    $("#policy_error_message").css("color","red");

    error_policy = true;
  }
  else {
    $("#policy_error_message").hide();
    error_policy = false;
  }

}


// displaying error ends 



$("#formId").submit(function (e) {
  e.preventDefault();
  check_name();
  check_pass();
  check_email();
  check_country();
  check_state();
  check_city();
  check_gender();
  check_forgot();
  check_profile();
  check_policy();




  if (error_name === false && error_pass === false && error_email === false && error_country === false && error_state === false && error_city === false && error_gender === false && error_forgot === false && error_profile === false && error_policy === false) {


    var formData = new FormData(this);

    $.ajax({
      type: "post",
      url: "signup_user.php",
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
            location.reload();
           
          });


        }
        else {
          return false;
        }
      }


    })



  } else {

    return false;
  }


});




 





