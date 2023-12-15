//!signup validation

$(document).ready(function () {

    $(document).on("keyup","#lid",function () { 
        $("#lid").css({"color" : "black", "outline-color" : "rgb(0, 181, 0)"});
        $("#lid small").css({"color" : "rgb(0, 181, 0)"});
        $("#lid small").text("");
    });
    $(document).on("keyup","#spass", function(){
        isPassword("#spass");
    });

    $(document).on("click","#sbtn", function(){
        is_Signup();
    });
    
    $(document).on("click","#lbtn", function(){
        is_Login();
 
    });
    
});




function is_Login()
{
    var lid = $("#lid").val();
    var lpass = $("#lpass").val();


    if(lid.length === 0 || lpass.length === 0){
        // show modal empty field
        $("#modal").load("../validation/validate.php", {emptyLoginfieldModal: "yes"});
         //  id form change
        (lid.length === 0 && !(lpass.length === 0))?  $("#lid-field").load("../validation/validate.php", {emptyIDinput: "yes", id: lid}):
            //  password form change
        (lpass.length === 0 && !(lid.length === 0 ))?  $("#lpass-field").load("../validation/validate.php", {emptyPassinput: "yes", pass: lpass}):"";
        
        if(lpass.length === 0 && lid.length === 0 ){
             //  both form change
            $("#lid-field").load("../validation/validate.php", {emptyIDinput: "yes", id: lid});
            $("#lpass-field").load("../validation/validate.php", {emptyPassinput: "yes", pass: lpass});
        }

    }else{
        $.post("../validation/validate.php",
        {
            login: "set",
            id: lid,
            pass: lpass,
    
        },
        function (result){
            $("#modal").html(result);
            $("#modal").load("../validation/validate.php", {emtyModal: "yes"});
        });
    
    }
}




// TODO: NOT FINISH SIGNUP validation

function is_Signup()
{
    var sid = $("#sid").val();
    var semail = $("#semail").val();
    var spassword = $("#spass").val();
    var scpassword = $("#scpass").val();

    $.post("../validation/validate.php",
    {
        signup: "set",
        id: sid,
        email: semail,
        pass: spassword,
        cpass: scpassword
    },
    function (result){
        $("#modal").html(result);
        $("#modal").load("../validation/validate.php", {emtyModal: "yes"});
    });

}



function isvalid_Email(id)
{
    var email = $(id).val().trim();
    alert(email)
   if(!email.length == 0){
    if (mailValidation(email)) {
        $("#email-field input").css("outline-color", "green");
        $("#email-field small").text("* valid email");
        $("#email-field small").css("color", "green");
        return true;
    }else{  
        $("#email-field input").css("outline-color", "red");
        $("#email-field small").text("* invalid email");
        $("#email-field small").css("color", "red");
        return false;
    }    
   }else{
        $("#email-field input").css("outline-color", "red");
        $("#email-field small").text("* fill this form");
        $("#email-field small").css("color", "red");
        return false;
   }
}







function is_IDExist(id)
{
    var sid = $(id).val().trim();
    var res = false;
    if(sid.length == 0){
        $("#id-field input").css("outline-color", "red");
        $("#id-field small").text("* fill this form");
        $("#id-field small").css("color", "red");
        return false;
    }else{
        $("#id-field").load("../validation/validate.php", {isExist: "yes", id: sid});
    }

}







function mailValidation(val) 
{
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(val)

}







function submitValidation()
{
    var valid = 0;
    if(!isID("#sid")){
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





function passwordStrength(id)
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