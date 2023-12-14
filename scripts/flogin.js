
//! FOR LANDING PAGE HEADER, LOGIN, SIGNUP FUNCTIIONALITY


$(document).ready(function(){
    show_landing();
   $(document).on("click", "#vanlogin, #gotoLog, #llogin", function(){
        runNavigations(false, false, true);
   });

   $(document).on("click", "#gotoSign", function(){
        runNavigations(false, true, false)
    });
  
});



function runNavigations(landing, signup, login)
{
    if(login){
        show_login();
    }else if(signup){
        show_signup();
    }else if(landing){
        show_landing();
    }
}



function show_login()
{
    $.ajax({
        type: "get",
        url: "../components/login.php",
        data: {login: "yes"},
        success: function (response) {
            $("#login-page").remove();
            $("#signup-page").remove();
            $("#landing-page").remove();
            $("#body-content").append(response);
            $("#login-page").hide(0).fadeIn("slow");
        }   
    });
}

function show_signup()
{
    $.ajax({
        type: "get",
        url: "../components/signup.php",
        data: {signup: "yes"},
        success: function (response) {
            $("#login-page").remove();
            $("#signup-page").remove();
            $("#landing-page").remove();
            $("#body-content").append(response);
            $("#signup-page").hide(0).fadeIn("slow");
        }   
    });
}


function show_landing()
{
    $.ajax({
        type: "get",
        url: "../components/landing.php",
        data: {landing: "yes"},
        success: function (response) {
            $("#login-page").remove();
            $("#signup-page").remove();
            $("#landing-page").remove();
            $("#body-content").append(response);
            $("#landing-page").hide(0).fadeIn("slow");
        }   
    });
}











