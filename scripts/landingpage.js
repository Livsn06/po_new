
//! FOR LANDING PAGE HEADER, LOGIN, SIGNUP FUNCTIIONALITY


$(document).ready(function(){
    show_login();
   $(document).on("click", "#vanlogin, #gotoLog, #llogin", function(){
    show_login();
   });

   $(document).on("click", "#gotoSign", function(){
        show_signup();
    });
  
});



function show_login()
{
    $("#body-content").load("../components/login.php", {islogin: "yes"}, function (){
        $("#login-page").hide(0).fadeIn("slow");
    });
}

function show_signup()
{
    $("#body-content").load("../components/signup.php", {issignup: "yes"}, function (){
        $("#signup-page").hide(0).fadeIn("slow");
     });
}


function show_landing()
{
    $("#body-content").load("../components/landing.php", {islanding: "yes"}, function (){
        $("#landing-page").hide(0).fadeIn("slow");
     });

}











