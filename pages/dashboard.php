<?php
include "../scripts/dash.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../scripts/dashfunction.js"></script>
    

    <title>Project Orbit | Dashboard</title>
</head>
<body>
    <section class="outer-body">
        
    <!-- main content -->
        <main class="right-sec">
            <header class="navigation">
                
                <button class="notif">
                    <i class="fa-solid fa-bell fa-xl"></i>
                </button>

                <button class="user">
                    <img src="../images/profile.jpg" alt="">
                    <h1>Junn jr</h1>
                    <i class="fa-solid fa-caret-down"></i>
                </button>

            </header>

            <section class="inner-contents" id="content-show">
              <!-- show contents of something -->

                
<main class="board" id="board">


    <div class="sorter">

        <div>
            <label for="sort">Sort by</label>
            <select name="" id="">
                <option value="">Sort by date</option>
            </select>
        </div>

        <div>
            <button>search</button>
            <input type="text">
        </div>

    </div>
    <div class="cards">
        <div id="create-proj">
            <button id="newproj">
                Create board
                <i class="fa-regular fa-plus fa-lg create-icon "></i>
            </button>
        </div>
        
<?php
   $iduser = 13;

   require "../config/config.php";
   $syntax = "SELECT projectid, projectname, projectcover FROM project  
   INNER JOIN user ON userID = adminid WHERE userID = $iduser";

   $result = $conn -> query($syntax);

if($result -> num_rows > 0){
    while($row = $result->fetch_assoc()){
?>
        <!-- cards reapeating -->
        <div style="background-image: url(<?php echo $row['projectcover']?>);" id="exisproj">
            <button id="proj<?php echo $row['projectid']?>" value="<?php echo $row['projectid']?>">
                <?php echo $row['projectname']?>
            </button>
            <?php 
            if(isPinned($iduser, $row['projectid']) != '-1'){
            ?>
                <i class="fa-solid fa-star star" style="color: #ffbb00;"></i>
            <?php
            }else{
            ?>
                <i class="fa-regular fa-star star" style="color: #ffbb00;"></i>
            <?php
            }
            ?>
        </div>
<?php
    }
}
?>
    
    </div>

</main>



<?php
function isPinned($Uid, $pid )
{
    
    require "../config/config.php";
    $command = "SELECT pinid, uid, projid FROM 
    pinned_project WHERE projid = '$pid' AND uid = '$Uid'";
    $result = $conn->query($command);
    if($result -> num_rows > 0){
       while($row = $result -> fetch_assoc()){
            return $row["pinid"];
       }
    }
    $result -> free();
    return '-1';
}


?>




            </section>
        </main>

        <!-- SIDEBAR -->
        <main class="left-sec">    
            <aside class="sidebar">
                <button class="logo">
                    <img src="../images/logo_2.png" alt="">
                </button>
                
                <div class="menu">
                   <small> Main menu</small>

                   <button class="selected" id="navboard" value="showboard">
                   <i class="fa-solid fa-folder-closed fa-lg icon"></i>
                        Board
                   </button>
                   <button id="navmember" value="showmember">
                   <i class="fa-solid fa-user-group fa-lg icon "></i>
                        Members
                   </button>
                   <button id="navcalendar" value="showcalendar">
                   <i class="fa-solid fa-calendar-days fa-lg icon"></i>
                        Calendar
                   </button>
                </div>
                
                <hr class="line">
                
                <div class="starred">
                    <small>Starred project</small>
                    <div class="pin-card">
                        <!-- this is ajax fetching query -->
                        <div class="card">
                            <button id="" value="">
                                <img src="../images/signup_bg.png" alt="">
                                project 1
                            </button>
                            <i class="fa-solid fa-star star" style="color: #ffbb00;"></i>
                        </div>        
                    </div>                
                </div>
            </aside>
        </main>

    </section>
    
    <div>


    </div>


</body>
</html>
<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('cal');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth'
  });
  calendar.render();
});

</script>
