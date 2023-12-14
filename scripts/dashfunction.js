$(document).ready(function () {
    changeNavigation();

    $(document).on("click", "#newproj", function(){
        $.ajax({
            type: "post",
            url: "../components/create.php",
            success: function (content) {
                $("#content-show").append(content);
            }
        });
    });
 
});


function showContent(id)
{
    var value = $(id).val();

    if(value == "showboard"){
        $.ajax({
            type: "post",
            url: "../components/board.php",
            data: {board: value},
            success: function (content) {
         
                $("#content-show").append(content);
     
            }
        });
    }else
    if(value == "showmember"){

        $.ajax({
            type: "post",
            url: "../components/member.php",
            data: {member: value},
            success: function (content) {
          
                $("#content-show").append(content);
    
            }
        });
    }else
    if(value == "showcalendar"){
        
        $.ajax({
            type: "post",
            url: "../components/calendar.php",
            data: {calendar: value},
            success: function (content) {
         
                $("#content-show").append(content);
       
            }
        });
    }


}





function changeNavigation()
{
    $(document).on("click", "#navboard", function(){

        showContent("#navboard");
    });
    $(document).on("click", "#navmember", function(){
        showContent("#navmember");
    });
    $(document).on("click", "#navcalendar", function(){
        showContent("#navcalendar");
    });
}