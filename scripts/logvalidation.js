//!signup validation

$(document).ready(function () {
    $(document).on("keyup","#suser", function(){
        isUsername("#suser");
    });
    $(document).on("keyup","#semail", function(){
        isEmail("#semail");
    });
    $(document).on("keyup","#spass", function(){
        isPassword("#spass");
    });
    $(document).on("keyup","#scpass", function(){
        isConfirm("#spass", "#scpass");
    });


    $(document).on("click","#sbtn", function(){
        if(submitValidation()){
            resultSignup();
        }
    });
  
});


function resultSignup()
{
    var USER = $("#suser").val();
    var EMAIL = $("#semail").val();
    var PASS = $("#scpass").val();
    $.ajax({
        type: "post",
        url: "../validation/validation.php",
        data: {finalSign: "yes", user: USER, email: EMAIL, pass: PASS },
        success: function (response) {
            $("#body-content").append(response);
            $("#modal").remove();
        }
    });
}






function submitValidation()
{
    var valid = 0;
    if(!isUsername("#suser")){
        $('#suserindic').text('Username must be at least 5 characters');
        $("#suserindic").css("color", "red");
        $("#suser").css("outline-color", "red");
   }else{
    valid +=1 ;
   }
   if(!isEmail("#semail")){
        $('#semailindic').text('invalid email.');
        $("#semailindic").css("color", "red");
        $("#semail").css("outline-color", "red");

   }else{
    valid +=1 ;
    }
   if(!isPassword("#spass")){
        $('#spassindic').text("invalid password");
        $("#spassindic").css("color", "red");
        $("#spass").css("outline-color", "red");

   }else{
    valid +=1 ;
    }
   
    if(!isConfirm("#spass", "#scpass")){
        $('#scpassindic').text("invalid confirmation");
        $("#scpassindic").css("color", "red");
        $("#scpass").css("outline-color", "red");
  
    }else{
        valid +=1 ;
    }
   return valid == 4;
}

function isUsername(id)
{
    var username = $(id).val();

   if(!username.length <= 0){
    if (username.length < 5) {
        $('#suserindic').text('Username must be at least 5 characters');
        $("#suserindic").css("color", "red");
        $(id).css("outline-color", "red");
        return false;
    }else{  
        $('#suserindic').text('Username available..');
        $("#suserindic").css("color", "green");
        $(id).css("outline-color", "green");
        return true;
    }    
   }else{

    $('#suserindic').text('required..');
    $("#suserindic").css("color", "orange");
    $(id).css("outline-color", "green");
    return false;
   }
}


function isEmail(id)
{
    var email = $(id).val();

   if(!email.length <= 0){
    if (!mailValidation(email)) {
        $('#semailindic').text('invalid email.');
        $("#semailindic").css("color", "red");
        $(id).css("outline-color", "red");
        return false;
    }else{  
        $('#semailindic').text('email available..');
        $("#semailindic").css("color", "green");
        $(id).css("outline-color", "green");
        return true;
    }    
   }else{
    $('#semailindic').text('required..');
    $("#semailindic").css("color", "orange");
    $(id).css("outline-color", "green");
    return false;
   }
}

function mailValidation(val) 
{
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(val)

}


function isPassword(id)
{
    var pass = $(id).val();
    var str =  checkPasswordStrength(pass);
   if(!pass.length <= 0){
    if (str < 2) {
        $('#spassindic').text('weak password');
        $("#spassindic").css("color", "orange");
        $(pass).css("outline-color", "orange");
        return true;
    }else if(str < 3){  
        $('#spassindic').text('medium password');
        $("#spassindic").css("color", "yellow");
        $(pass).css("outline-color", "yellow");
        return true;
    } else if(str < 4){
        $('#spassindic').text('strong password');
        $("#spassindic").css("color", "green");
        $(id).css("outline-color", "green");
        return true;
    }  
   }else{
    $('#spassindic').text("required");
    $("#spassindic").css("color", "orange");
    $(pass).css("outline-color", "green");
    return false;
   }
}

function checkPasswordStrength(password) {

    var strength = 0;
    var tips = "";
  
    // Check password length
    if (password.length < 8) {
      tips += "Make the password longer. ";
    } else {
      strength += 1;
    }
  
    // Check for mixed case
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
      strength += 1;
    } else {
      tips += "Use both lowercase and uppercase letters. ";
    }
  
    // Check for numbers
    if (password.match(/\d/)) {
      strength += 1;
    } else {
      tips += "Include at least one number. ";
    }
  
    // Check for special characters
    if (password.match(/[^a-zA-Z\d]/)) {
      strength += 1;
    } else {
      tips += "Include at least one special character. ";
    }
  
    // Return results
  return strength;
  }

  
function isConfirm(id, cid)
{
    var pass = $(id).val();
    var cpass = $(cid).val();
   if(!pass.length <= 0){
    if(cpass.length <= 0){
        $('#scpassindic').text("required");
        $("#scpassindic").css("color", "orange");
        $(cid).css("outline-color", "green");
        return false;
    }else if (pass == cpass) {
        $('#scpassindic').text("similar password");
        $("#scpassindic").css("color", "green");
        $(cid).css("outline-color", "green");
        return true;
    }else{  
        $('#scpassindic').text('does not similar');
        $("#scpassindic").css("color", "red");
        $(cid).css("outline-color", "red");
        return false;
    }
   }else{
    $('#scpassindic').text("password needed");
    $("#scpassindic").css("color", "orange");
    $(cid).css("outline-color", "green");
    return false;
   }
}