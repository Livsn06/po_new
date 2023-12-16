<!-- FOR INSTRUCTOR -->

<?php
// session_start();

// if not log in ung session ng instructor page babalik sa landing page
if(!isset($_SESSION['instrLogin'])){
    header("Location: index.php");
}
// if not log in as instructor pero naka log in as student babalik sya sa student homepage
if(isset($_SESSION['studLogin'])){
    header("Location: home.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <!-- J QUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />


       <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://kit.fontawesome.com/a3ac451aad.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/dashboard.css">

    <script src="../scripts/dashfunction.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth'
  });
  calendar.render();
});

</script>
    
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
      
            <section id="for-cal">
                <div id="calendar" ></div>
            </section>
            <section class="inner-contents" id="content-show">
      
            <!-- !CONTENTS SHOW -->
                

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
    
</body>
</html>


