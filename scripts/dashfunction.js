$(document).ready(function () {
    changeNavigation();
    showBoard();
});



function changeNavigation()
{
    $("#calendar").fadeOut(0);
    $(document).on("click", "#navboard", function(){
        $("#calendar").fadeOut(0);
        $(".menu button").removeClass("selected");
        $("#navboard").addClass("selected");
        showBoard();
    });
    $(document).on("click", "#navmember", function(){
        $("#calendar").fadeOut(0);
        $(".menu button").removeClass("selected");
        $("#navmember").addClass("selected");
        showMember();
     
    });
    $(document).on("click", "#navcalendar", function(){
        
        $(".menu button").removeClass("selected");
        $("#navcalendar").addClass("selected");
        showCalendar();
    });
}

function showBoard(){
    $("#content-show").load("../content/menu.php", {isboard: "yes"}, function(){
        $("#board").fadeOut(0).fadeIn(500);
    });

}
function showMember(){
    $("#content-show").load("../content/menu.php", {ismember: "yes"}, function(){
        $("#member").fadeOut(0).fadeIn(500);
    });
}
function showCalendar(){
    $("#content-show").load("../content/menu.php", {iscalendar: "yes"}, function(){
        $(" #calendar").fadeIn(500);
    })

}
